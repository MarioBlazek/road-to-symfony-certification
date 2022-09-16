<?php

declare(strict_types=1);

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

final class SymfonyGithubInfoCommand extends Command
{
    private HttpClientInterface $httpClient;

    public function __construct(HttpClientInterface $githubClient)
    {
        parent::__construct();
        $this->httpClient = $githubClient;
    }
    protected function configure(): void
    {
        $this->setName('app:http-client:get');
        $this->setDescription('Simple demonstration of HttpClient component');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        try {
            $response = $this->httpClient->request('GET', 'https://api.github.com/repos/symfony/symfony-docs');

            $io->section('Status code');
            dump($response->getStatusCode());
            $io->newLine(2);

            $io->section('Headers');
            dump($response->getHeaders());
            $io->newLine(2);

            $io->section('Content');
            dump($response->getContent());
            $io->newLine(2);

            $io->section('Content transformed into an array');
            dump($response->toArray());
            $io->newLine(2);

            $io->section('Info');
            dump($response->getInfo());
            $io->newLine(2);

//            $response->cancel();

        } catch (TransportExceptionInterface $exception) {

            $io->warning($exception->getMessage());

            return Command::FAILURE;

        }


        return Command::SUCCESS;
    }
}
