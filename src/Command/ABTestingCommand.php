<?php

namespace App\Command;

use App\Dto\DesignDto;
use App\Dto\DesignsDto;
use App\Providers\ABTestDesignsProvider;
use App\Services\ABTestingService;
use App\Services\PrintService;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
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

    private PrintService $printService;

    public function __construct(
        ABTestingService $abTestingService,
        PrintService $printService
    ) {
        parent::__construct();
        $this->abTestingService = $abTestingService;
        $this->printService = $printService;
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

        $this->printService->printBestPromotionalDesign($bestDesign, $designsDto);

        return Command::SUCCESS;
    }
}
