<?php

namespace App\Services;

use App\Dto\NextTvSeriesDto;
use App\Dto\TVSeriesProgramDto;
use App\Entity\TVSeries;
use App\Repository\TVSeriesRepository;
use Doctrine\ORM\EntityManagerInterface;

class TVSeriesService
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * Will gives us the next TV series for the current hour and earliest week day in the tv series programming.
     *
     * @return void
     */
    public function nextInProgram(TVSeriesProgramDto $dto): NextTvSeriesDto
    {
        $currentTime = $dto->getCurrentTime() ?? new \DateTime('now');
        $date = \DateTime::createFromFormat('H:i', $currentTime);

        if ($date && $date->format('H:i') != $currentTime) {
            throw new \Exception('Please provide a valid time for hour:minute');
        }

        if (false === $date && '' !== $currentTime) {
            throw new \Exception('Please provide a date with the full format hour:minute');
        }

        $currentTime = false === $date ? new \DateTime('11:00', new \DateTimeZone('GMT+1')) : $date;

        /** @var TVSeriesRepository */
        $tvSeries = $this->entityManager->getRepository(TVSeries::class);
        /** @var array */
        $nextTvSeries = $tvSeries->findByIntervalAndTitle($currentTime, $dto->getTitle())[0];

        $dto = new NextTvSeriesDto();
        $dto->setChannel($nextTvSeries['channel']);
        $dto->setTime($nextTvSeries['showTime']->format('H:i'));
        $dto->setTitle($nextTvSeries['title']);
        $dto->setGender($nextTvSeries['gender']);
        $dto->setWeekDay($nextTvSeries['weekDay']);

        return $dto;
    }
}
