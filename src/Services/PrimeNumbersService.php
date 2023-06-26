<?php

namespace App\Services;

use App\Dto\PrimeFactorsDto;
use App\Model\PrimeFactorization;
use App\Transformers\PrimeFactorsTransformer;

class PrimeNumbersService
{
    private array $numbers;

    /**
     * prints all integer values from 1 to 100.
     */
    public function createRangeOfPrimeFactors(int $start, int $finish): PrimeFactorsDto
    {
        // refactor into DTO
        $this->initializeNumbersRange($start, $finish)
            ->attachPrimeFactorizationData();

        $primeFactorsTransformer = new PrimeFactorsTransformer();
        $primeFactors = $primeFactorsTransformer->transform($this->numbers);

        $dto = new PrimeFactorsDto();
        $dto->setPrimeFactors($primeFactors);

        return $dto;
    }

    /**
     * Set numbers array to a given range.
     */
    private function initializeNumbersRange(int $from, int $to, int $step = 1): self
    {
        $this->numbers = range($from, $to, $step);

        return $this;
    }

    /**
     * Map numbers array to the information required by the service.
     */
    private function attachPrimeFactorizationData(): self
    {
        $model = new PrimeFactorization();
        $this->numbers = array_map(function ($number) use ($model) {
            return $model->setNumber($number)->getFactors();
        }, $this->numbers);

        return $this;
    }
}
