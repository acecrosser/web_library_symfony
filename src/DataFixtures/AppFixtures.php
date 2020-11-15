<?php

namespace App\DataFixtures;

use App\Entity\Books;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Cocur\Slugify\SlugifyInterface;
use Faker\Factory;

class AppFixtures extends Fixture
{
    private $faker;
    private $slug;

    public function __construct(SlugifyInterface $slugify)
    {
        $this->faker = Factory::create();
        $this->slug = $slugify;
    }

    public function load(ObjectManager $manager): string
    {
        $this->loadBooks($manager);
    }

    public function loadBooks(ObjectManager $manager): string
    {
        for ($i = 1; $i < 20; $i++) {
            $book = new Books();
            $book->setTitle($this->faker->text(100));
            $book->setAuthor($this->faker->text(20));
            $book->setYear($this->faker->text(10));
            $book->setSlug($this->slug->slugify($book->getTitle()));
            $book->setBody($this->faker->text(1000));
            $book->setCreated($this->faker->dateTime);

            $manager->persist($book);
        }
        $manager->flush();
    }
}