<?php

namespace App\Dto;

class ASCIIRangeDto
{
    private string $ascii_char_range_start;

    /**
     * @var array with chars as keys
     */
    private string $ascii_char_range_end;

    /**
     * Get the value of ascii_char_range_end.
     */
    public function getAsciiCharRangeEnd(): string
    {
        return $this->ascii_char_range_end;
    }

    /**
     * Set the value of ascii_char_range_end.
     */
    public function setAsciiCharRangeEnd(string $ascii_char_range_end): self
    {
        $this->ascii_char_range_end = $ascii_char_range_end;

        return $this;
    }

    /**
     * Get the value of ascii_char_range_start.
     */
    public function getAsciiCharRangeStart(): string
    {
        return $this->ascii_char_range_start;
    }

    /**
     * Set the value of ascii_char_range_start.
     */
    public function setAsciiCharRangeStart(string $ascii_char_range_start): self
    {
        $this->ascii_char_range_start = $ascii_char_range_start;

        return $this;
    }
}
