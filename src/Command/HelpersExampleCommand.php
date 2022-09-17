<?php

declare(strict_types=1);

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Cursor;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ChoiceQuestion;
use Symfony\Component\Console\Question\ConfirmationQuestion;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Process\Process;

#[AsCommand(
    name: 'app:example-helpers',
    description: 'Add a short description for your command',
)]
class HelpersExampleCommand extends Command
{
    protected function configure(): void
    {
        $this
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $io->section("Question example:");
        $helper = $this->getHelper('question');
        $question = new ConfirmationQuestion('Continue with this action? ', false);

        if (!$helper->ask($input, $output, $question)) {
            return Command::SUCCESS;
        }

        $question = new Question('Please enter the name of the bundle: ', 'AcmeDemoBundle');
        $bundleName = $helper->ask($input, $output, $question);

        $question = new ChoiceQuestion(
            'Please select your favorite color (defaults to red)',
            ['red', 'blue', 'yellow'],
            0
        );
        $question->setErrorMessage('Color %s is invalid.');

        $color = $helper->ask($input, $output, $question);
        $output->writeln('You have just selected: '.$color);


        $bundles = ['AcmeDemoBundle', 'AcmeBlogBundle', 'AcmeStoreBundle'];
        $question = new Question('Please enter the name of a bundle: ', 'FooBundle');
        $question->setAutocompleterValues($bundles);
        $bundleName = $helper->ask($input, $output, $question);





        $io->writeln("");
        $io->section("Progress Bar example:");
        $progressBar = new ProgressBar($output, 10);
        $progressBar->start();

        $i = 0;
        while ($i++ < 10) {
            sleep(1);
            $progressBar->advance();
        }

        $progressBar->finish();






        $io->writeln('');
        $io->writeln('');
        $io->section("Table example:");
        $table = new Table($output);
        $table
            ->setHeaders(['ISBN', 'Title', 'Author'])
            ->setRows([
                ['99921-58-10-7', 'Divine Comedy', 'Dante Alighieri'],
                ['9971-5-0210-0', 'A Tale of Two Cities', 'Charles Dickens'],
                ['960-425-059-0', 'The Lord of the Rings', 'J. R. R. Tolkien'],
                ['80-902734-1-6', 'And Then There Were None', 'Agatha Christie'],
            ])
        ;
        $table->render();






        $io->writeln('');
        $io->section("Formatter example:");
        $formatter = $this->getHelper('formatter');

        $formattedLine = $formatter->formatSection(
            'SomeSection',
            'Here is some message related to that section'
        );
        $output->writeln($formattedLine);


        $errorMessages = ['Error!', 'Something went wrong'];
        $formattedBlock = $formatter->formatBlock($errorMessages, 'error');
        $output->writeln($formattedBlock);

        $message = "This is a very long message, which should be truncated";
        $truncatedMessage = $formatter->truncate($message, 7);
        $output->writeln($truncatedMessage);






        $io->writeln('');
        $io->section("Debug Formatter example:");
        $debugFormatter = $this->getHelper('debug_formatter');

        $process = new Process(['ls', '-lha']);

        $output->writeln($debugFormatter->start(
            spl_object_hash($process),
            'Running ls'
        ));

        $process->run(function ($type, $buffer) use ($output, $debugFormatter, $process) {
            $output->writeln(
                $debugFormatter->progress(
                    spl_object_hash($process),
                    $buffer,
                    Process::ERR === $type
                )
            );
        });

        $output->writeln(
            $debugFormatter->stop(
                spl_object_hash($process),
                'Finishing the command',
                $process->isSuccessful()
            )
        );







        $io->writeln('');
        $io->section("Cursor example:");
        $cursor = new Cursor($output);

        $cursor->clearScreen();

        $output->write('My text');


        return Command::SUCCESS;
    }
}
