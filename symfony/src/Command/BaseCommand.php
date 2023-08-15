<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

abstract class BaseCommand extends Command {

    protected SymfonyStyle $io;

    /**
     * @param InputInterface  $input
     * @param OutputInterface $output
     *
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output): int {
        $this->io = new SymfonyStyle($input, $output);
        return self::SUCCESS;
    }

    /**
     * Get the base path of the epay solution
     * @return false|string
     */
    protected static function getBasePath(): bool|string {
        return realpath(__DIR__ . '/../../');
    }

    /**
     * A message or array of messages to log to the output
     *
     * @param array|string $message
     *
     * @return void
     */
    protected function log(array|string $message): void {
        $messages = \is_array($message) ? array_values($message) : [$message];
        foreach ($messages as $message) {
            $this->io->writeln(sprintf('[%s] %s', date('Y-m-d\TH:i:sO'), $message));
        }
    }
}