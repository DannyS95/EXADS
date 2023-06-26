<?php

namespace App\Services;

use App\Dto\ASCIIMissingRangeDto;
use App\Dto\DesignDto;
use App\Dto\DesignsDto;
use App\Dto\NextTvSeriesDto;
use App\Dto\PrimeFactorsDto;

class PrintService
{
    public function printFactors(PrimeFactorsDto $primeFactorsDto): void
    {g
        foreach ($primeFactorsDto->getPrimeFactors() as $number => $primeFactors) {
            ++$number;
            echo "The factors of number $number are: $primeFactors \n";
        }
    }

    public function printTVSeries(NextTvSeriesDto $dto)
    {
        $daysOfTheWeek = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

        echo "The next series in schedule will be:
         {$dto->getTitle()} will air on channel '{$dto->getChannel()}' at '{$dto->getTime()}' on '{$daysOfTheWeek[$dto->getWeekDay()]}'\n";
    }

    public function printMissingAsciiCharacterFromAsciiRange(ASCIIMissingRangeDto $asciiMissingRangeDto, string $missingChar): void
    {
        $originalRange = implode("\n", $asciiMissingRangeDto->getCompleteAsciiRange());
        $newRange = implode("\n", $asciiMissingRangeDto->getMissingAsciiRange());

        echo "The character '{$missingChar}' was removed from the range of characters:
            '$originalRange' and the result is '$newRange'"
        ;
    }

    public function printBestPromotionalDesign(DesignDto $bestDesign, DesignsDto $designsDto)
    {
        echo "The promotional design with best conversion rate for '{$designsDto->getPromotion()}' is:
             '{$bestDesign->getDesignName()}' with a conversion rate of '{$bestDesign->getSplitPercent()}'\n"
        ;
    }
}
