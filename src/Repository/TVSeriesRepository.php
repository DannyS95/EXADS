<?php

namespace App\Repository;

use App\Entity\TVSeries;
use App\Entity\TVSeriesIntervals;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TVSeries>
 *
 * @method TVSeries|null find($id, $lockMode = null, $lockVersion = null)
 * @method TVSeries|null findOneBy(array $criteria, array $orderBy = null)
 * @method TVSeries[]    findAll()
 * @method TVSeries[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TVSeriesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TVSeries::class);
    }

    public function save(TVSeries $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(TVSeries $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * @return TVSeries[] Returns an array of TVSeries objects
     */
    public function findByIntervalAndTitle(\DateTime $time, string $title = ''): array
    {
        $qb = $this->createQueryBuilder('t')
            ->select('t.title, t.channel, t.gender')
            ->addSelect('intervals.showTime, intervals.weekDay')
            ->leftJoin(TVSeriesIntervals::class, 'intervals', 'WITH', 't.id = intervals.id_tv_series')
            ->where('intervals.showTime >= :time')
            ->setParameter('time', $time)
            ->setMaxResults(1)
            ->orderBy('intervals.weekDay, intervals.showTime', 'ASC');

        if ('' !== $title) {
            $qb->andWhere('t.title = :title')
               ->setParameter('title', $title);
        }

        return $qb->getQuery()->getResult();
    }
}
