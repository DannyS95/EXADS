<?php

namespace App\Dto;

class PrimeFactorsDto
{
    private array $primeFactors;

    /**
     * Get the value of primeFactors.
     */
    public function getPrimeFactors(): array
    {
        return $this->primeFactors;
    }

    /**
     * Set the value of primeFactors.
     */
    public function setPrimeFactors(array $primeFactors): self
    {
        $this->primeFactors = $primeFactors;

        return $this;
    }
}
