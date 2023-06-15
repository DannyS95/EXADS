<?php

namespace App\Entity;

use App\Repository\TVSeriesIntervalsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TVSeriesIntervalsRepository::class)]
#[ORM\Table(name: 'tv_series_intervals')]
class TVSeriesIntervals
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private int $id_tv_series;

    #[ORM\Column]
    private ?int $weekDay = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $showTime = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getWeekDay(): ?int
    {
        return $this->weekDay;
    }

    public function setWeekDay(int $weekDay): static
    {
        $this->weekDay = $weekDay;

        return $this;
    }

    public function getShowTime(): ?\DateTimeInterface
    {
        return $this->showTime;
    }

    public function setShowTime(\DateTimeInterface $showTime): static
    {
        $this->showTime = $showTime;

        return $this;
    }

    /**
     * Get the value of id_tv_series.
     */
    public function getIdTvSeries(): int
    {
        return $this->id_tv_series;
    }

    /**
     * Set the value of id_tv_series.
     */
    public function setIdTvSeries(int $id_tv_series): self
    {
        $this->id_tv_series = $id_tv_series;

        return $this;
    }
}
