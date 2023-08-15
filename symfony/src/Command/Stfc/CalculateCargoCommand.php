<?php

namespace App\Command\Stfc;

use App\Command\BaseCommand;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'stfc:cargo-calc',
    description: 'Calculate the time for a STFC ship to become get to the cargo amount',
    aliases: [],
    hidden: false
)]
class CalculateCargoCommand extends BaseCommand {

    /**
     * @return void
     */
    protected function configure(): void {
        $this
            ->setHelp('Simple Calculator to give time to OPC for STFC mining ships')
            ->addArgument('rate', InputArgument::REQUIRED, 'Mining Rate (per hour)')
            ->addArgument('size', InputArgument::REQUIRED, 'OPC Cargo Limit (in Kilo)')
        ;
    }

    /**
     * @param InputInterface  $input
     * @param OutputInterface $output
     *
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output):int {
        parent::execute($input,$output);

        $rate = (float) $input->getArgument('rate');
        $size = (float) $input->getArgument('size');

        $hours =  ($size * 1000) / $rate; // will return the amount of hours to OPC;
        $init = $hours * 60 * 60;

        $hours = (int) floor($init / 3600);
        $minutes = (int) floor((intval($init / 60)) % 60);
        $init = (int) $init;
        $seconds = $init % 60;

        $this->io->note("Your ship will mine {$size}K cargo in " . self::getPrettyTimeMessage($hours, $minutes, $seconds));

        return self::SUCCESS;

    }

    protected static function getPrettyTimeMessage($hours, $minutes, $seconds): string {
        $result = '';

        foreach (
            [
                [
                    'time' => $hours,
                    'text'=> 'hours',
                ],
                [
                    'time' => $minutes,
                    'text' => 'minutes'
                ],
                [
                    'time' => $seconds,
                    'text' => 'seconds'
                ]
            ] as $item) {
            if($item['time'] > 0) {
                if(strlen($result)) $result .= ', ';
                $result .= sprintf('%02d ' . $item['text'], $item['time']);
            }
        }
        return $result;
    }

}