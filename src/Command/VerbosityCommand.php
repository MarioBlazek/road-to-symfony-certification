<?php

declare(strict_types=1);

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:verbosity',
    description: 'Add a short description for your command',
)]
class VerbosityCommand extends Command
{
    protected function configure(): void
    {

    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $io->writeln("Normal output.");

        if ($output->isVerbose()) {
            $io->info('Verbose');
        }

        if ($output->isVeryVerbose()) {
            $io->warning('Very verbose');
        }

        if ($output->isDebug()) {
            $io->error('Debug');
        }

        return Command::SUCCESS;
    }
}
