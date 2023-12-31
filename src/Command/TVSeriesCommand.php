<?php

namespace App\Command;

use App\Dto\TVSeriesProgramDto;
use App\Console\TVSeriesPrinter;
use App\Services\TVSeriesService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'next-tv-series',
    description: 'script that tells when the next TV Series will 
        air based on current time-date or inputted time-date and an optional title filter',
)]
class TVSeriesCommand extends Command
{
    private TVSeriesService $tvSeriesService;

    private TVSeriesPrinter $tvSeriesPrinter;

    public function __construct(
        TVSeriesService $tvSeriesService,
        TVSeriesPrinter $tvSeriesPrinter
    ) {
        parent::__construct();
        $this->tvSeriesService = $tvSeriesService;
        $this->tvSeriesPrinter = $tvSeriesPrinter;
    }

    protected function configure(): void
    {
        $this->addArgument('time', InputArgument::OPTIONAL, 'current time for program consultation', '')
            ->addArgument('series_title', InputArgument::OPTIONAL, 'filter for the only series you wish to search for', '');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $tvSeriesProgramDto = new TVSeriesProgramDto();
        $tvSeriesProgramDto->setCurrentTime($input->getArgument('time'));
        $tvSeriesProgramDto->setTitle($input->getArgument('series_title'));

        $tvSeriesProgramDto = $this->tvSeriesService->nextInProgram($tvSeriesProgramDto);

        $this->tvSeriesPrinter->setMessage($tvSeriesProgramDto)->print($output);

        return Command::SUCCESS;
    }
}
