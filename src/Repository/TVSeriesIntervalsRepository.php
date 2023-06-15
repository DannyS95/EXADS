<?php

namespace App\Repository;

use App\Entity\TVSeriesIntervals;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TVSeriesIntervals>
 *
 * @method TVSeriesIntervals|null find($id, $lockMode = null, $lockVersion = null)
 * @method TVSeriesIntervals|null findOneBy(array $criteria, array $orderBy = null)
 * @method TVSeriesIntervals[]    findAll()
 * @method TVSeriesIntervals[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TVSeriesIntervalsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TVSeriesIntervals::class);
    }

    public function save(TVSeriesIntervals $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(TVSeriesIntervals $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return TVSeriesIntervals[] Returns an array of TVSeriesIntervals objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?TVSeriesIntervals
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
