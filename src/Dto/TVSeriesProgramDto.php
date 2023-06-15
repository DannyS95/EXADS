<?php

namespace App\Dto;

class TVSeriesProgramDto
{
    private string $currentTime = '';

    private string $title = '';

    /**
     * Get the value of currentTime.
     *
     * @return string
     */
    public function getCurrentTime(): ?string
    {
        return $this->currentTime;
    }

    /**
     * Set the value of currentTime.
     */
    public function setCurrentTime(string $currentTime): self
    {
        $this->currentTime = $currentTime;

        return $this;
    }

    /**
     * Get the value of title.
     *
     * @return string
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * Set the value of title.
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }
}
