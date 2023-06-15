<?php

namespace App\Services;

use App\Dto\ASCIIMissingRangeDto;
use App\Dto\ASCIIRangeDto;

class AsciiRangeService
{
    public function removeRandomCharacterFromAsciiRange(ASCIIRangeDto $asciiRangeDto): ASCIIMissingRangeDto
    {
        $charRange = array_flip(range($asciiRangeDto->getAsciiCharRangeStart(), $asciiRangeDto->getAsciiCharRangeEnd()));
        $charRangeCopy = array_flip(range($asciiRangeDto->getAsciiCharRangeStart(), $asciiRangeDto->getAsciiCharRangeEnd()));

        $randomChar = chr(rand(44, 124));
        unset($charRangeCopy[$randomChar]);

        $charRange = array_values(array_keys($charRange));
        $charRangeCopy = array_values(array_keys($charRangeCopy));

        $asciiRangeDto = new ASCIIMissingRangeDto();
        $asciiRangeDto->setCompleteAsciiRange($charRange);
        $asciiRangeDto->setMissingAsciiRange($charRangeCopy);

        return $asciiRangeDto;
    }

    public function findMissingCharacterFromTwoRanges(ASCIIMissingRangeDto $asciiMissingRangeDto): string
    {
        $missingChar = array_values(array_diff(
            $asciiMissingRangeDto->getCompleteAsciiRange(),
            $asciiMissingRangeDto->getMissingAsciiRange()
        ));

        return $missingChar[0];
    }
}
