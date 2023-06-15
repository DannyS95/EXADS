<?php

namespace App\Providers;

use App\Dto\DesignDto;
use App\Dto\DesignsDto;
use Exads\ABTestData;

class ABTestDesignsProvider
{
    public function getDesigns(int $designId): DesignsDto
    {
        $abTest = new ABTestData($designId);
        $promotion = $abTest->getPromotionName();

        $designs = array_map(function ($item) {
            $designDto = new DesignDto();
            $designDto->setSplitPercent($item['splitPercent']);
            $designDto->setDesignName($item['designName']);
            $designDto->setDesignId($item['designId']);

            return $designDto;
        }, $abTest->getAllDesigns());

        $designsDto = new DesignsDto();
        $designsDto->setDesigns($designs);
        $designsDto->setPromotion($promotion);

        return $designsDto;
    }
}
