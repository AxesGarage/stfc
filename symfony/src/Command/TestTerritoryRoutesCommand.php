<?php

namespace App\Command;

use App\Utils\Stfc\Territory\Data;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'test:territory-routes',
    description: 'Validate the territory data',
)]
class TestTerritoryRoutesCommand extends Command
{

    protected function execute(InputInterface $input, OutputInterface $output): int
    {

        $territoryRoutes = Data::getTerritoryRoutes();

        $spelling_errors = false;
        /* ensure every entry is in the array keys to check spelling */
        foreach ($territoryRoutes as $territory => $territoryRoute) {
            foreach ($territoryRoute as $territoryName) {
                if(!array_key_exists($territoryName, $territoryRoutes)) {
                    $output->writeln($territoryName . ' from ' . $territory . ' is not a valid territory name');
                    $spelling_errors = true;
                }
            }
        }
        if(!$spelling_errors) $output->writeln(["","Spelling Verification Completed!",""]);

        $cross_errors = false;
        /* cross-reference that the routes are in both territories entries */
        foreach ($territoryRoutes as $territory => $territoryRoute) {
            foreach ($territoryRoute as $territoryName) {
                if(!in_array($territory, $territoryRoutes[$territoryName])) {
                    $output->writeln($territory . ' routes do not cross reference with ' . $territoryName . ' routes');
                    $cross_errors = true;
                }
            }
        }

        if(!$cross_errors) $output->writeln(["","Cross Reference Check Completed!",""]);

        return Command::SUCCESS;
    }
}
