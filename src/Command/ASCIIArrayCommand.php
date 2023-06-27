<?php

namespace App\Command;

use App\Dto\ASCIIMissingRangeDto;
use App\Dto\ASCIIRangeDto;
use App\Services\AsciiRangeService;
use App\Console\ASCIIArrayPrinter;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'ascii-array',
    description: 'script that prints that generates an array containing all 
        ASCII characters from comma(",") to pipe ("|") but discards a random character from it and outputs the result,
        what character was randomly removed + the result',
)]
class ASCIIArrayCommand extends Command
{
    private AsciiRangeService $asciiRangeService;

    private ASCIIArrayPrinter $asciiArrayPrinter;

    public function __construct(
        AsciiRangeService $asciiRangeService,
        ASCIIArrayPrinter $asciiArrayPrinter
    ) {
        parent::__construct();
        $this->asciiRangeService = $asciiRangeService;
        $this->asciiArrayPrinter = $asciiArrayPrinter;
    }

    protected function configure(): void
    {
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $asciiRangeDto = new ASCIIRangeDto();
        $asciiRangeDto->setAsciiCharRangeStart(',')
            ->setAsciiCharRangeEnd('|');

        /**
         * @var ASCIIMissingRangeDto
         */
        $asciiMissingRangeDto = $this->asciiRangeService->removeRandomCharacterFromAsciiRange($asciiRangeDto);

        $missingChar = $this->asciiRangeService->findMissingCharacterFromTwoRanges($asciiMissingRangeDto);

        $this->asciiArrayPrinter->setMessage($asciiMissingRangeDto, $missingChar)->print($output);

        return Command::SUCCESS;
    }
}
