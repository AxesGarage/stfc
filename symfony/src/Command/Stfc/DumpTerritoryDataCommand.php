<?php

namespace App\Command\Stfc;

use App\Command\BaseCommand;
use App\Utils\Stfc\Territory\Data;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'util:dump-territory',
    description: 'Dump the Territory Data Array into CSV format',
    aliases: [],
    hidden: false
)]
class DumpTerritoryDataCommand extends BaseCommand {

    /**
     * @return void
     */
    protected function configure() {
        $this
            ->addArgument('format', InputArgument::OPTIONAL, 'Output format (csv or json)', 'csv')
            ->addOption('screen', 's',InputOption::VALUE_NONE, 'Only Output Results table to screen')
            ->setHelp(<<<HELP
The <info>%command.name%</info> command will generate a csv output to stdOut of the Territory Data Array

Optionally the output can be formatted to a text table for easier screen reading

 <info>%command.full_name% </info><comment> -s</comment>

Alliance tags are required

HELP
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output): int {
        parent::execute($input, $output);

        $screen = $input->getOption('screen');
        $format = $input->getArgument('format');
        if(!in_array($format, ['csv', 'json'])){
            $this->io->error('Unsupported Format Requested');
            return self::FAILURE;
        }
        $territories = Data::getTerritoryData();

        $result = [];

        foreach($territories as $name => $data){
            $defence = new \DateTime($data[Data::KEY_CAPTURE]);
            $result[] = [
                'name' => $name,
                'level' => strlen($data[Data::KEY_LEVEL]),
                'capture' => $data[Data::KEY_CAPTURE],
                'dow' => $defence->format('N'),
                'hour' => $defence->format('H'),
                'particle' => $data[Data::KEY_PARTICLE],
                'routes' => implode(', ', Data::getRoutes($name))
            ];
        }
        if($screen){
            $this->io->table(
                array_keys($result[0]),
                $result
            );
        } else {
            $out = fopen('php://output', 'w');

            switch ($format){
                case 'csv':
                    foreach($result as $index => $line) {
                        if(0 === $index) fputcsv($out, array_keys($line));
                        fputcsv($out, $line);
                    }
                    break;
                case 'json':
                    $json_result = array_reduce($result, function($json, $item) {
                        $json[$item['name']] = $item;
                        return $json;
                    },[]);
                    fwrite($out, json_encode($json_result, JSON_NUMERIC_CHECK));
                    break;
            }

            fclose($out);
        }

        return self::SUCCESS;
    }
}
