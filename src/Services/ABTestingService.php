<?php

namespace App\Services;

use App\Dto\DesignDto;
use App\Dto\DesignsDto;

class ABTestingService
{
    public function getDesignBestWithConversionRate(DesignsDto $designsDto): DesignDto
    {
        /**
         * @var DesignDto[] $bestConversionRate
         */
        $bestConversionRate = array_reduce($designsDto->getDesigns(), function ($carry, DesignDto $designDto) {
            if (null === $carry) {
                $carry[0] = $designDto;
            }

            /**
             * @var DesignDto $designDtoCompare
             */
            $designDtoCompare = $carry[0];

            if ($designDto->getSplitPercent() > $designDtoCompare->getSplitPercent()) {
                $carry[0] = $designDtoCompare;
            }

            return $carry;
        });

        return $bestConversionRate[0];
    }
}
