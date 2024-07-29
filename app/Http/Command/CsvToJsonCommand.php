<?php

namespace App\Http\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputDefinition;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'csv-to-json', description: 'Convert csv to json')]
class CsvToJsonCommand extends Command
{
    protected function configure(): void
    {
        $this->setDefinition(
            new InputDefinition(
                [
                    new InputOption('from', 'f', InputOption::VALUE_REQUIRED),
                    new InputOption('to', 't', InputOption::VALUE_OPTIONAL),
                ]
            )
        );
    }
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $json_content = [];
        $inputFileName = $input->getOption('from');
        $outputFileName = $input->getOption('to');

        if (!file_exists($inputFileName)){
            $output->writeln("<error>File not found</>");
            return Command::FAILURE;
        }

        $items = array_map('str_getcsv', file($inputFileName));
        $header = array_shift($items);
        foreach ($items as $item){
            $json_content [] = array_combine($header, $item);
        }

        file_put_contents($outputFileName, json_encode($json_content, JSON_PRETTY_PRINT));
        $output->writeln("<info>File converted successfully</>");
        return Command::SUCCESS;
    }
}