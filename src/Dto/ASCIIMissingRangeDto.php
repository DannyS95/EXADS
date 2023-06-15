<?php

namespace App\Dto;

class ASCIIMissingRangeDto
{
    private array $completeAsciiRange;

    private array $missingAsciiRange;

    /**
     * Get the value of completeAsciiRange.
     */
    public function getCompleteAsciiRange(): array
    {
        return $this->completeAsciiRange;
    }

    /**
     * Set the value of completeAsciiRange.
     */
    public function setCompleteAsciiRange(array $completeAsciiRange): self
    {
        $this->completeAsciiRange = $completeAsciiRange;

        return $this;
    }

    /**
     * Get the value of missingAsciiRange.
     */
    public function getMissingAsciiRange(): array
    {
        return $this->missingAsciiRange;
    }

    /**
     * Set the value of missingAsciiRange.
     */
    public function setMissingAsciiRange(array $missingAsciiRange): self
    {
        $this->missingAsciiRange = $missingAsciiRange;

        return $this;
    }
}
