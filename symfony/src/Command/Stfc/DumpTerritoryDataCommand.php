<?php

namespace App\Command\Stfc;

use App\Command\BaseCommand;
use App\Utils\Stfc\Territory\Data;
use Symfony\Component\Console\Attribute\AsCommand;
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

    protected function configure() {
        $this
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
        $territories = Data::getTerritoryData();


        $result = [];

        foreach($territories as $name=>$data){
            $result[] = [
                'Name' => $name,
                'Level' => strlen($data[Data::KEY_LEVEL]),
                'Capture' => $data[Data::KEY_CAPTURE],
                'Particle' => $data[Data::KEY_PARTICLE],
                'Routes' => implode(', ', Data::getRoutes($name))
            ];
        }
        if($screen){
            $this->io->table(
                array_keys($result[0]),
                $result
            );
        } else {
            $out = fopen('php://output', 'w');
            foreach($result as $index => $line) {
                if(0 === $index) fputcsv($out, array_keys($line));
                fputcsv($out, $line);
            }
            fclose($out);
        }

        return self::SUCCESS;
    }
}