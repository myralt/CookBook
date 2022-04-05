<?php

namespace App\DataFixtures;

use App\Entity\Recipe;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $recipe1 = new Recipe([
            "name" => "Maquereaux à la vapeur",
            "rating" => 3,
            "description" => "Maqueraux cuits à la vapeur sur des spaghettis de courgettes et des tomates cuites en sauce.",
            "cookingTime" => 20,
            "preparation" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
            "persons" => 2,
            "pinned" => true,
            "creationDate" => new DateTime()
        ]);
        $recipe2 = new Recipe([
            "name" => "Pois chiches aux poivrons mitonnés",
            "rating" => 3,
            "description" => "Mélange de légumes épicé qui peut se manger froid ou chaud.",
            "cookingTime" => 25,
            "preparation" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
            "persons" => 2,
            "creationDate" => new DateTime()
        ]);
        $recipe3 = new Recipe([
            "name" => "Poulet laqué aux haricots",
            "rating" => 4,
            "description" => "Un plat de viande légé.",
            "cookingTime" => 30,
            "preparation" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
            "persons" => 2,
            "creationDate" => new DateTime()
        ]);
        // $manager->persist($product);

        $manager->flush();
    }
}
