<?php

namespace App\Command;

use App\Dto\DesignDto;
use App\Dto\DesignsDto;
use App\Console\ABTestingPrinter;
use App\Services\ABTestingService;
use App\Providers\ABTestDesignsProvider;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'ab-testing',
    description: 'script that gives us the best conversion rate for designs',
)]
class ABTestingCommand extends Command
{
    private ABTestingService $abTestingService;

    private ABTestingPrinter $abTestingPrinter;

    public function __construct(
        ABTestingService $abTestingService,
        ABTestingPrinter $abTestingPrinter
    ) {
        parent::__construct();
        $this->abTestingService = $abTestingService;
        $this->abTestingPrinter = $abTestingPrinter;
    }

    protected function configure(): void
    {
        $this->addArgument('design', InputArgument::OPTIONAL, 'provider the design number of your choice', 1);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $designId = intval($input->getArgument('design'));

        $designs = new ABTestDesignsProvider();

        /** @var DesignsDto $designsDto */
        $designsDto = $designs->getDesigns($designId);

        /** @var DesignDto $bestDesign */
        $bestDesign = $this->abTestingService->getDesignBestWithConversionRate($designsDto);

        $this->abTestingPrinter->setMessage($bestDesign, $designsDto)->print($output);

        return Command::SUCCESS;
    }
}
