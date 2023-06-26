<?php

namespace App\Command;

use App\Services\PrimeNumbersService;
use App\Services\PrintService;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'print-prime-numbers',
    description: 'script that prints all integer values from 1 to 100 and their respective multipliers, or if the number is just prime',
)]
class PrimeNumbersCommand extends Command
{
    private PrimeNumbersService $primeNumbersService;

    private PrintService $printService;

    public function __construct(
        PrimeNumbersService $primeNumbersService,
        PrintService $printService
    ) {
        parent::__construct();
        $this->primeNumbersService = $primeNumbersService;
        $this->printService = $printService;
    }

    protected function configure(): void
    {
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $primeFactors = $this->primeNumbersService->createRangeOfPrimeFactors(1, 100);

        $this->printService->printFactors($primeFactors);

        return Command::SUCCESS;
    }
}
