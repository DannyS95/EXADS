<?php

namespace App\Model;

class PrimeFactorization
{
    private int $number;

    private array $factors;

    /**
     * Get the value of multiples.
     *
     * @return array<string>
     */
    public function getFactors(): array
    {
        $this->setFactors();

        return $this->factors;
    }

    /**
     * Set the value of multiples.
     */
    private function setFactors(): self
    {
        $this->factors = [1];

        for ($i = 2; $i < $this->number; ++$i) {
            if (0 === bccomp(bcmod($this->number, $i), 0)) {
                $this->factors[] = $i;
            }
        }

        $this->factors[] = $this->number;

        if (2 === count($this->factors)) {
            $this->factors = ['PRIME'];
        }

        return $this;
    }

    public function getNumber(): int
    {
        return $this->number;
    }

    /**
     * sets the number which we want to get prime factors from.
     *
     * @var int
     */
    public function setNumber(int $number): self
    {
        $this->number = $number;

        return $this;
    }
}
