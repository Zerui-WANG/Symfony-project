<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;

class UserFixtures extends Fixture
{
    public function __construct(EntityManagerInterface $entityManager, UrlGeneratorInterface $urlGenerator, CsrfTokenManagerInterface $csrfTokenManager, UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->entityManager = $entityManager;
        $this->urlGenerator = $urlGenerator;
        $this->csrfTokenManager = $csrfTokenManager;
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {

        //Un utilisateur normal
        $user = new User();
        $plainPassword = 'ryanpass';
        $encoded = $passwordEncoder->encodePassword($user, $plainPassword);
        $user->setPassword($encoded);
        $hash = $passwordEncoder->encodePassword($user, $user->getPassword());
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
