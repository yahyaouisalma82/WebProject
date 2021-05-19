<?php

namespace App\DataFixtures;

use App\Entity\BlogPost;
use App\Entity\PetForAdoption;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $encoder;
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder= $encoder;

    }
    public function load(ObjectManager $manager)
    {

        $faker =Factory::create('fr_FR');
        $user=new User();
        $user->setEmail('user@test.com')
             ->setName($faker->lastName)
             ->setFirstName($faker->firstName())
             ->setAPropos($faker->text());
        $password=$this->encoder->encodePassword(
            $user, 'password'
        );
        $user->setPassword($password);
        $manager->persist($user);

        for($i=0 ;$i <10 ;$i++){
            $blogPost= new BlogPost();
            $blogPost->setContenu($faker->text(150))
                ->setCreatedAt($faker->dateTime('now'))
                ->setTitre($faker->words(3,true))
                ->setUser($user);
            $manager->persist($blogPost);
        }
        for($i=0 ;$i <10 ;$i++){
            $pet= new PetForAdoption();
            $pet->setName($faker->word())
                ->setAge($faker->numberBetween(1,2))
                ->setDescription($faker->text(20))
                ->setColor($faker->word())
                ->setGender($faker->word())
                ->setKind($faker->word())
                ->setLocation($faker->slug(6))
                ->setOwner($user)
                ->setPhotoFile('/img/pet.jpg');

            $manager->persist($pet);
        }

        $manager->flush();
    }
}
