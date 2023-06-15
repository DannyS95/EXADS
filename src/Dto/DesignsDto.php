<?php

namespace App\Dto;

class DesignsDto
{
    /**
     * All the designs of a given promotion.
     *
     * @var DesignDto[]
     */
    private array $designs;

    private string $promotion;

    /**
     * Get the value of designs.
     */
    public function getDesigns(): array
    {
        return $this->designs;
    }

    /**
     * Set the value of designs.
     */
    public function setDesigns(array $designs): self
    {
        $this->designs = $designs;

        return $this;
    }

    /**
     * Get the value of promotion.
     */
    public function getPromotion(): string
    {
        return $this->promotion;
    }

    /**
     * Set the value of promotion.
     */
    public function setPromotion(string $promotion): self
    {
        $this->promotion = $promotion;

        return $this;
    }
}
