<?php

namespace App\DataFixtures;

use App\Factory\CategoryFactory;
use App\Factory\CommentFactory;
use App\Factory\PostFactory;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        CategoryFactory::createMany(8);

        PostFactory::createMany(40, function() {
            return [
                'category' => CategoryFactory::random()
            ];
        });
        
        // Crear comentarios relacionados con posts existentes
        CommentFactory::createMany(100, function() {
            return [
                'post' => PostFactory::random()
            ];
        });
    }
}
