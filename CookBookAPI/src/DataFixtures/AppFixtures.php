<?php

namespace App\DataFixtures;

use App\Entity\Folder;
use App\Entity\Image;
use App\Entity\Ingredient;
use App\Entity\Product;
use App\Entity\Recipe;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Placeholder object ------------------------------
        $folder = new Folder("Plats simples");

        // Demo recipe 1 data -------------------------------
        $recipe1 = new Recipe([
            "name" => "Maquereaux à la vapeur",
            "rating" => 3,
            "description" => "Maqueraux cuits à la vapeur sur des spaghettis de courgettes et des tomates cuites en sauce.",
            "cookingTime" => 20,
            "preparation" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
            "persons" => 2,
            "pinned" => true,
            "creationDate" => new DateTime(),
            "folder" => $folder
        ]);

        $ingredients1 = [
            new Ingredient([
                "unit" => "unit",
                "quantity" => 2,
                "product" => new Product("filet de maquereaux")
            ]), new Ingredient([
                "unit" => "unit",
                "quantity" => 2,
                "product" => new Product("courgette")
            ]), new Ingredient([
                "unit" => "unit",
                "quantity" => 15,
                "product" => new Product("tomate")
            ]), new Ingredient([
                "unit" => "unit",
                "quantity" => 1,
                "product" => new Product("citron")
            ])
        ];

        foreach ($ingredients1 as $value) {
            $recipe1->addIngredient($value);
        }

        $recipe1->addImage(new Image([
            "path" => "photo1.png",
            "main" => true
        ]));

        // Demo recipe 2 data ---------------------------------
        $recipe2 = new Recipe([
            "name" => "Pois chiches aux poivrons mitonnés",
            "rating" => 3,
            "description" => "Mélange de légumes épicé qui peut se manger froid ou chaud.",
            "cookingTime" => 25,
            "preparation" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
            "persons" => 2,
            "creationDate" => new DateTime(),
            "folder" => $folder
        ]);

        $ingredients2 = [
            new Ingredient([
                "unit" => "unit",
                "quantity" => 3,
                "product" => new Product("poivron")
            ]), new Ingredient([
                "unit" => "gr",
                "quantity" => 300,
                "product" => new Product("pois chiches")
            ]), new Ingredient([
                "unit" => "unit",
                "quantity" => 1,
                "product" => new Product("oignon rouge")
            ]), new Ingredient([
                "unit" => "gr",
                "quantity" => 5,
                "product" => new Product("cumin")
            ])
        ];

        foreach ($ingredients2 as $value) {
            $recipe2->addIngredient($value);
        }

        $recipe2->addImage(new Image([
            "path" => "photo2.png",
            "main" => true
        ]));


        // Demo recipe 3 data ----------------------------------
        $recipe3 = new Recipe([
            "name" => "Poulet laqué aux haricots",
            "rating" => 4,
            "description" => "Un plat de viande légé.",
            "cookingTime" => 30,
            "preparation" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
            "persons" => 2,
            "pinned" => true,
            "creationDate" => new DateTime()
        ]);

        $ingredients3 = [
            new Ingredient([
                "unit" => "unit",
                "quantity" => 2,
                "product" => new Product("filet de poulet")
            ]), new Ingredient([
                "unit" => "gr",
                "quantity" => 300,
                "product" => new Product("haricots verts")
            ]), new Ingredient([
                "unit" => "unit",
                "quantity" => 4,
                "product" => new Product("gousse d'ail")
            ]), new Ingredient([
                "unit" => "ml",
                "quantity" => 45,
                "product" => new Product("sauce soja claire (sucrée)")
            ]), new Ingredient([
                "unit" => "ml",
                "quantity" => 45,
                "product" => new Product("vinaigre balsamique")
            ])
        ];

        foreach ($ingredients3 as $value) {
            $recipe3->addIngredient($value);
        }

        $recipe3->addImage(new Image([
            "path" => "photo3.png",
            "main" => true
        ]));

        // Persists all demo recipe objects and loads to database:
        $manager->persist($recipe1);
        $manager->persist($recipe2);
        $manager->persist($recipe3);

        $manager->flush();
    }
}
