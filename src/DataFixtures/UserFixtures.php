<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $encode;

    public function __construct(UserPasswordEncoderInterface $encoder) {
        $this->encode = $encoder;
    }

    public function load(ObjectManager $manager)
    {

        //Un utilisateur normal
        $user = new User();
        $plainPassword = 'ryanpass';
        $encoded = $encode->encodePassword($user, $plainPassword);
        $user->setPassword($encoded);
        $hash = $encode->encodePassword($user, $user->getPassword());
        $user->setEmail("userNormal@confinementClassroom.fr")
             ->setRoles(array("ROLE_USER"))
             ->setPseudo("User Normal")



             ->setPassword("Jesuisusernormal");
        $manager->persist($user);
        $manager->flush();

        /*
        //Un utilisateur admin
        $user = new User();
        $user->setEmail("userAdmin@confinementClassroom.fr")
             ->setRoles(array("ROLE_ADMIN"))
             ->setPseudo("User Normal")
             ->setPassword("Jesuisuseradmin");
        $manager->persist($user);
        $manager->flush();*/
    }
}
