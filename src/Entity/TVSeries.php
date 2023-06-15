<?php

namespace App\Entity;

use App\Repository\TVSeriesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TVSeriesRepository::class)]
#[ORM\Table(name: 'tv_series')]
class TVSeries
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $title = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $channel = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $gender = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getChannel(): ?string
    {
        return $this->channel;
    }

    public function setChannel(?string $channel): static
    {
        $this->channel = $channel;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(?string $gender): static
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get the value of tvSeriesIntervals.
     */
    public function getTvSeriesIntervals()
    {
        return $this->tvSeriesIntervals;
    }

    /**
     * Set the value of tvSeriesIntervals.
     */
    public function setTvSeriesIntervals($tvSeriesIntervals): self
    {
        $this->tvSeriesIntervals = $tvSeriesIntervals;

        return $this;
    }
}
