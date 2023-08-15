<?php

namespace App\Command\Stfc;

use App\Command\BaseCommand;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use App\Utils\ArrayFunctions\Utils;
use App\Utils\Stfc\Alliance;
use App\Utils\Stfc\Territory;
use Symfony\Component\Yaml\Yaml;

#[AsCommand(
    name: 'stfc:territory-list',
    description: 'Generate the Territory Defense Schedule for the passed alliance',
    aliases: [],
    hidden: false
)]
class GenerateTerritoryListCommand extends BaseCommand {

    /**
     * @return void
     */
    protected function configure(): void {
        $this
            ->addArgument('server', InputArgument::REQUIRED, 'The Target server to pull alliance data from')
            ->addArgument('alliance', InputArgument::REQUIRED, 'The Alliance to generate the schedule for')
            ->setHelp(<<<EOF
The <info>%command.name%</info> command will generate the discord text format for the passed alliance territory defense

A settings file must be provided to the generator:

 <info>%command.full_name% </info><comment> server</comment> <comment>alliance</comment>

Alliance tags are required

EOF
            )
        ;
    }

    /**
     * @param InputInterface  $input
     * @param OutputInterface $output
     *
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output): int {
        parent::execute($input,$output);

        $server = $input->getArgument('server');
        $sourceData = Yaml::parseFile(self::getBasePath() . '/data/stfc.yaml');

        if(!isset($sourceData[$server])){
            $this->io->error("Server: '{$server}' could not be found. No source data available");
            return self::FAILURE;
        }

        $alliance = strtoupper($input->getArgument('alliance'));

        try {
            $this->validateTerritoryFile($sourceData[$server]['Alliances']);
        } catch (\InvalidArgumentException $e){
            $this->io->error($e->getMessage());
            return self::FAILURE;
        }

        try {
            $allianceTerritory = $this->allianceTerritoryList($sourceData[$server]['Alliances'], $alliance);
        } catch (\InvalidArgumentException $e){
            $this->io->error($e->getMessage());
            return self::FAILURE;
        }

        $this->io->writeln("## Server {$server}:" . $sourceData[$server]['name']);
        $currentWeek = (new \DateTime())->format('W');
        $this->io->writeln("### [{$alliance}] Territory Defense Schedule for Week #{$currentWeek}");
        /** @var Territory $territory */
        foreach ($allianceTerritory[$alliance]->getTerritories() as $territory) {
            $territoryWeek = (new \DateTime('@' . $territory->getTime()))->format('W');
            if ($territoryWeek === $currentWeek) {
                $this->io->writeln(sprintf('* **%s** (\%s) at <t:%s:F> `[%s]` %s minute duration',
                    $territory->getName(),
                    implode('\\', str_split($territory->getLevel())),
                    $territory->getTime(),
                    $territory->getCapture(),
                    $territory->getDuration()));
            } else {
                $this->io->writeln(sprintf('* **%s** (\%s) - has already occurred',
                $territory->getName(),
                implode('\\', str_split($territory->getLevel()))
                ));
            }
        }
        $this->io->writeln('_All times are displayed in your local timezone_');
        return self::SUCCESS;
    }

    protected static function parseTerritoryFile(array $stfcData) {
        return array_reduce($stfcData, function($result, $data){
            $territories = array_filter(array_map('trim', $data['Territories']));
            $result[$data['Alliance']] = new Alliance($data['Alliance'], $data['Status'], $territories);
            return $result;
        }, []);
    }

    protected function validateTerritoryFile(array $stfcData) {
        $territories = array_reduce($stfcData, function($result, $data){
            $territories = array_map('trim', $data['Territories']);
            foreach ($territories as $territory) {
                if($territory !== '') dotAppend($result, $territory, $data['Alliance']);
            }
            return $result;
        }, []);
        foreach ($territories as $territory => $amount) {
            if(dotCount($territories, $territory) > 1) {
                $this->io->warning("{$territory} is recorded as being owned by multiple alliances : '" . implode(",", dotGet($territories, $territory)) . "'");
            }
            try {
                Territory\Data::getCapture($territory);
            } catch (\InvalidArgumentException $e){
                throw new \RuntimeException($territory);
            } catch (\Exception $e) {
            }
        }
    }

    /**
     * @param array  $stfcData
     * @param string $alliance
     *
     * @return Alliance[]
     */
    protected function allianceTerritoryList(array $stfcData, string $alliance): array {
        /** @var Alliance[] $territories */
        $territories = $this->parseTerritoryFile($stfcData);

        if(!in_array($alliance, array_keys($territories))){
            throw new \InvalidArgumentException("The alliance '{$alliance}' is not defined in the source data");
        }

        if(count($territories[$alliance]->getTerritories()) === 0){
            throw new \InvalidArgumentException("The alliance '{$alliance}' does not have a defined territory");
        }

        return $territories;
    }
}