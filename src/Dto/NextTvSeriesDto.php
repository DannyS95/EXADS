<?php

namespace App\Dto;

class NextTvSeriesDto
{
    private string $title;

    private string $channel;

    private string $time;

    private int $weekDay;

    private string $gender;

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

    /**
     * Get the value of channel.
     */
    public function getChannel(): string
    {
        return $this->channel;
    }

    /**
     * Set the value of channel.
     */
    public function setChannel(string $channel): self
    {
        $this->channel = $channel;

        return $this;
    }

    /**
     * Get the value of time.
     */
    public function getTime(): string
    {
        return $this->time;
    }

    /**
     * Set the value of time.
     */
    public function setTime(string $time): self
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Get the value of weekDay.
     */
    public function getWeekDay(): int
    {
        return $this->weekDay;
    }

    /**
     * Set the value of weekDay.
     */
    public function setWeekDay(int $weekDay): self
    {
        $this->weekDay = $weekDay;

        return $this;
    }

    /**
     * Get the value of gender.
     */
    public function getGender(): string
    {
        return $this->gender;
    }

    /**
     * Set the value of gender.
     */
    public function setGender(string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }
}
