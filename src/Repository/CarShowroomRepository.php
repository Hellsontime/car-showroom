<?php

namespace App\Repository;

use App\Entity\CarShowroom;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CarShowroom>
 *
 * @method CarShowroom|null find($id, $lockMode = null, $lockVersion = null)
 * @method CarShowroom|null findOneBy(array $criteria, array $orderBy = null)
 * @method CarShowroom[]    findAll()
 * @method CarShowroom[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CarShowroomRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CarShowroom::class);
    }

    public function add(CarShowroom $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(CarShowroom $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function getAveragePriceAllTime(): array
    {
        return $this->createQueryBuilder('c')
            ->select('avg(c.price), count(c)')
            ->andWhere('c.date_of_sale IS NOT NULL')
            ->getQuery()
            ->getResult();
    }

    public function getAveragePriceToday(): array
    {
        return $this->createQueryBuilder('c')
            ->select('avg(c.price), count(c)')
            ->andWhere('c.date_of_sale = :today')
            ->setParameter('today', date('Y-m-d'))
            ->getQuery()
            ->getResult();
    }

    public function getAveragePriceInRange(int $daysAgo): array
    {
        return $this->createQueryBuilder('c')
            ->select('avg(c.price), count(c)')
            ->andWhere('c.date_of_sale BETWEEN :from AND :to')
            ->setParameter('from', date('Y-m-d', strtotime('-'.$daysAgo.' day')))
            ->setParameter('to', date('Y-m-d'))
            ->getQuery()
            ->getResult();
    }

    public function getCarsSoldLastYear(): array
    {
        return $this->createQueryBuilder('c')
            ->select('c.date_of_sale AS date, COUNT(c.date_of_sale) AS sold')
            ->andWhere('c.date_of_sale BETWEEN :from AND :to')
            ->groupBy('c.date_of_sale')
            ->orderBy('c.date_of_sale', 'DESC')
            ->setParameter('from', date('Y-m-d', strtotime('-365 day')))
            ->setParameter('to', date('Y-m-d'))
            ->getQuery()
            ->getResult();
    }

//    /**
//     * @return CarShowroom[] Returns an array of CarShowroom objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?CarShowroom
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
