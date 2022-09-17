<?php

declare(strict_types=1);

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\QuestionHelper;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Style\SymfonyStyle;

class ExampleCommand extends Command
{
//    protected static $defaultName = 'app:example';
//    protected static $defaultDescription = 'Short description about what this command is about';

    private QuestionHelper $questionHelper;

    protected function configure(): void
    {
        $this->setName('app:example');
        $this->setDescription('Short description about what this command is about');
        $this->setHelp('Do you need help?');
        $this->setHidden(false);


        $this->addArgument('name', InputArgument::REQUIRED, 'Argument name is required');
        $this->addArgument('surname', InputArgument::OPTIONAL, 'Argument surname is optional', 'Default');
        $this->addArgument('address', InputArgument::OPTIONAL, 'Argument address is optional', );

        $this->addOption('years', 'y', InputOption::VALUE_REQUIRED, 'Option years requires a value');
        $this->addOption('sleep', 's', InputOption::VALUE_NONE, "Option sleep doesn't require a value");

        $this->addUsage('Just use me');
        $this->addUsage('It is very simple');
    }

    protected function initialize(InputInterface $input, OutputInterface $output): void
    {
        $this->questionHelper = $this->getHelper('question');
    }

    protected function interact(InputInterface $input, OutputInterface $output): void
    {
        $argument = $input->getArgument('name');

        if ($argument !== null) {
            return;
        }

        $question = new Question('You must enter name: ');
        $name = $this->questionHelper->ask($input, $output, $question);

        if ($name !== null) {
            $input->setArgument('name', $name);
        }
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $table = new Table($output);
        $table
            ->setHeaders(['Argument', 'Is set?', 'Value'])
            ->setRows([
                ['name', $input->hasArgument('name') ? 'true' : 'false', $input->getArgument('name')],
                ['surname', $input->hasArgument('surname') ? 'true' : 'false', $input->getArgument('surname')],
                ['address', $input->hasArgument('address') ? 'true' : 'false', $input->getArgument('address')],
            ])
        ;
        $table->render();

        $table = new Table($output);
        $table
            ->setHeaders(['Option', 'Is set?', 'Value'])
            ->setRows([
                ['years', $input->hasOption('years') ? 'true' : 'false', $input->getOption('years')],
                ['sleep', $input->hasOption('sleep') ? 'true' : 'false', $input->getOption('sleep')],
            ])
        ;
        $table->render();

        return Command::SUCCESS;
//        return Command::FAILURE;
//        return Command::INVALID;
    }
}
