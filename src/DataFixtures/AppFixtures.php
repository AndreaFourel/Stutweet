<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use App\Entity\User;

class AppFixtures extends Fixture
{
    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHusher = $passwordHasher;

    }
    public function load(ObjectManager $manager): void
    {
        $chris = new User($this->passwordHusher);
        $chris->setUsername("Chris")->setPassword('456');
        $manager->persist($chris);
        $feegle = new User($this->passwordHusher);
        $feegle->setUsername("Feegle")->setPassword('123');
        $manager->persist($feegle);
        $manager->flush();

    }
}
