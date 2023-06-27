<?php

namespace App\Command;

use App\Console\PrimeNumbersPrinter;
use App\Dto\PrimeFactorsDto;
use App\Services\PrintService;
use App\Services\PrimeNumbersService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'print-prime-numbers',
    description: 'script that prints all integer values from 1 to 100 and their respective multipliers, or if the number is just prime',
)]
class PrimeNumbersCommand extends Command
{
    private PrimeNumbersService $primeNumbersService;

    private PrimeNumbersPrinter $primeNumbersPrinter;

    public function __construct(
        PrimeNumbersService $primeNumbersService,
        PrimeNumbersPrinter $primeNumbersPrinter
    ) {
        parent::__construct();
        $this->primeNumbersService = $primeNumbersService;
        $this->primeNumbersPrinter = $primeNumbersPrinter;
    }

    protected function configure(): void
    {
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        /** @var PrimeFactorsDto $primeFactors */
        $primeFactors = $this->primeNumbersService->createRangeOfPrimeFactors(1, 100);

        $this->primeNumbersPrinter->setMessage($primeFactors)->print($output);

        return Command::SUCCESS;
    }
}
