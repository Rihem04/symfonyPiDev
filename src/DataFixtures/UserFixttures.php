<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixttures extends AppFixtures
{
    
    public function load(ObjectManager $manager): void
    {
        
        
        $admin = new User();
        $admin->setRole("ROLE_ADMIN");
        $admin->setNom("Ounissi");
        $admin->setMail("ounissiroua1@gmail.com");
        $admin->setNumeroTelephone("24983554");
        $admin->setPrenom("Roua");
        $admin->setAddresse("esprit");
        
        $admin->setPassword( '12345678');
        $manager->persist($admin);
        $manager->flush();

        $manager->flush();
    }
}
