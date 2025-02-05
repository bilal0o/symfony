<?php

namespace App\Repository;

use App\Entity\Teacher;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Teacher>
 */
class TeacherRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry, private EntityManagerInterface $entityManager)
    {
        parent::__construct($registry, Teacher::class);
    }


    public function add(Teacher $teacher, bool $flush=false){

     $this->entityManager->persist($teacher);
     if($flush){
        $this->entityManager->flush();
     }

    
    }

    public function remove(Teacher $teacher){
        $this->entityManager->remove($teacher);
        $this->entityManager->flush();
    }

    // public function update(Teacher $teacher, bool $flush=false,$id){

    //     $this->entityManager->persist($teacher);
    //     if($flush){
    //        $this->entityManager->flush();
    //     }
    // }
    //    /**
    //     * @return Teacher[] Returns an array of Teacher objects
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

    //    public function findOneBySomeField($value): ?Teacher
    //    {
    //        return $this->createQueryBuilder('t')
    //            ->andWhere('t.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
