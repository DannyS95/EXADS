<?php

namespace App\Dto;

class DesignDto
{
    private int $designId;

    private string $designName;

    private int $splitPercent;

    /**
     * Get the value of designId.
     */
    public function getDesignId(): int
    {
        return $this->designId;
    }

    /**
     * Set the value of designId.
     */
    public function setDesignId(int $designId): self
    {
        $this->designId = $designId;

        return $this;
    }

    /**
     * Get the value of designName.
     */
    public function getDesignName(): string
    {
        return $this->designName;
    }

    /**
     * Set the value of designName.
     */
    public function setDesignName(string $designName): self
    {
        $this->designName = $designName;

        return $this;
    }

    /**
     * Get the value of splitPercent.
     */
    public function getSplitPercent(): int
    {
        return $this->splitPercent;
    }

    /**
     * Set the value of splitPercent.
     */
    public function setSplitPercent(int $splitPercent): self
    {
        $this->splitPercent = $splitPercent;

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
