<?php

namespace App\Model;

class PrimeFactorization
{
    private int $number;

    private array $primeFactors;

    /**
     * Get the value of multiples.
     *
     * @return array<string>
     */
    public function getPrimeFactorizationData(): array
    {
        $this->setPrimeFactorization();

        return $this->primeFactors;
    }

    /**
     * Set the value of multiples.
     */
    private function setPrimeFactorization(): self
    {
        $this->primeFactors = [1];

        for ($i = 2; $i < $this->number; ++$i) {
            if (0 === bccomp(bcmod($this->number, $i), 0)) {
                $this->primeFactors[] = $i;
            }
        }

        $this->primeFactors[] = $this->number;

        if (0 === count($this->primeFactors)) {
            $this->primeFactors = ['PRIME'];
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
