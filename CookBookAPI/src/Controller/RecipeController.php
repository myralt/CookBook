<?php

namespace App\Controller;

use App\Entity\Recipe;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class RecipeController extends AbstractController
{
    #[Route('/add/recipe', name: 'new_recipe')]
    public function addRecipe(Request $req, SerializerInterface $serializer, ManagerRegistry $doctrine): Response
    {
        $form = $serializer->deserialize(
            $req->getContent(),
            RecipeForm::class,
            'json'
        );

        $entityManager = $doctrine->getManager();

        //$entityManager->persist($newRecipe);

        //$entityManager->flush();

        return new Response(
            '',
            Response::HTTP_OK,
            ['content-type' => 'application/json']
        );
    }

    #[Route('/all/recipes', name: 'all_recipes')]
    public function getAllRecipes(): Response
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
        ]);
    }

    #[Route('/all/recipes/{id}', name: 'recipe')]
    public function getRecipe(): Response
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
        ]);
    }

    #[Route('/update/recipe/{id}', name: 'mod_recipe')]
    public function updateRecipe(): Response
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
        ]);
    }

    #[Route('/delete/recipe/{id}', name: 'del_recipe')]
    public function deleteRecipe(): Response
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
        ]);
    }
}
