<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Teacher;
use App\Factory\TeacherFactory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        // $teacher= new Teacher();
        // $teacher->setname('shahab khan');
        // $teacher->setFatherName('mujeeb');
        // $teacher->setDateOfBirth(new \DateTimeImmutable('2001-01-01'));
        // $teacher->setAddress("peashawar");
        // $teacher->setEmail("shahab@gmail.com");
        // $manager->persist($teacher);

        // $teacher2= new Teacher();
        // $teacher2->setname('uzee');
        // $teacher2->setFatherName('faraz');
        // $teacher2->setDateOfBirth(new \DateTimeImmutable('2000-01-01'));
        // $teacher2->setAddress("pabbi");
        // $teacher2->setEmail("uzee@gmail.com");
        // $manager->persist($teacher2);
        // $manager->flush();

        TeacherFactory::createMany(50);
    }
}
