<?php

namespace App\Controller;

use App\Display\RecipeList;
use App\Entity\Folder;
use App\Entity\Recipe;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\SerializerInterface;


class FolderController extends AbstractController
{
    #[Route('/all/folders', name: 'all_folders', methods: 'GET')]
    public function getAllFolders(SerializerInterface $serializer, ManagerRegistry $doctrine): Response
    {
        $repo = $doctrine->getRepository(Folder::class);

        $allFolders = $repo->findAll();

        // Initialises and appends default folder regardless of query result:
        $allFolders[] = new Folder("All");

        $resp = $serializer->serialize($allFolders, 'json', [
            AbstractNormalizer::IGNORED_ATTRIBUTES => ['recipes']
        ]);

        return new Response(
            $resp,
            Response::HTTP_OK,
            ['content-type' => 'application/json']
        );
    }

    #[Route('all/folders/{id}', name: 'folder', methods: 'GET')]
    public function getFolder(int | string $id, SerializerInterface $serializer, ManagerRegistry $doctrine): Response
    {
        $repo = $doctrine->getRepository(Folder::class);

        if ($id != "all") {
            $selectedFolder = $repo->find($id);

            $format = [];

            foreach ($selectedFolder->getRecipes() as $recipe) {
                $format[] = new RecipeList([
                    "id" => $recipe->getId(),
                    "name" => $recipe->getName(),
                    "description" => $recipe->getDescription(),
                    "cookingTime" => $recipe->getCookingTime(),
                    "persons" => $recipe->getPersons(),
                    "rating" => $recipe->getRating()
                ]);
            }
        } else {
            $repo = $doctrine->getRepository(Recipe::class);

            $all = $repo->findAll();

            $format = [];

            foreach ($all as $recipe) {
                $format[] = new RecipeList([
                    "id" => $recipe->getId(),
                    "name" => $recipe->getName(),
                    "description" => $recipe->getDescription(),
                    "cookingTime" => $recipe->getCookingTime(),
                    "persons" => $recipe->getPersons(),
                    "rating" => $recipe->getRating()
                ]);
            }
        }

        $resp = $serializer->serialize($format, 'json', [
            DateTimeNormalizer::FORMAT_KEY => 'd-m-y H:i',
            AbstractNormalizer::IGNORED_ATTRIBUTES => ['folder', 'recipe']
        ]);

        return new Response(
            $resp,
            Response::HTTP_OK,
            ['content-type' => 'application/json']
        );
    }
}
