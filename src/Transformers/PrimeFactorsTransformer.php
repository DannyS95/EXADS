<?php

namespace App\Transformers;

class PrimeFactorsTransformer
{
    /**
     * @var array of a number and all of its prime factors as an array
     *
     * @return array of prime factors array converted to string
     */
    public function transform(array $primeFactors): array
    {
        return array_map(function ($values) {
            return implode(', ', $values);
        }, $primeFactors);
    }
}
