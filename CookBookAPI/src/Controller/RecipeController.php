<?php

namespace App\Controller;

use App\Display\RecipePin;
use App\Entity\Recipe;
use DateTime;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class RecipeController extends AbstractController
{
    #[Route('/add/recipe', name: 'new_recipe', methods: 'POST')]
    public function addRecipe(Request $req, SerializerInterface $serializer, ManagerRegistry $doctrine, ValidatorInterface $validator): Response
    {
        $form = new Recipe();

        $form = $serializer->deserialize(
            $req->getContent(),
            Recipe::class,
            'json'
        );

        $form->setCreationDate(new DateTime());

        $errors = $validator->validate($form);
        if (!count($errors)) {
            $em = $doctrine->getManager();

            $em->persist($form);

            $em->flush();

            $resp = $serializer->serialize($form, 'json', [
                DateTimeNormalizer::FORMAT_KEY => 'd-m-y H:i',
                AbstractNormalizer::IGNORED_ATTRIBUTES => ['recipes', 'recipe']
            ]);

            return new Response(
                //$req->getContent(),
                $resp,
                Response::HTTP_OK,
                ['content-type' => 'application/json']
            );
        }

        return $this->json([
            'message' => (string) $errors,
        ]);
    }

    #[Route('/all/recipes', name: 'all_recipes', methods: 'GET')]
    public function getAllRecipes(SerializerInterface $serializer, ManagerRegistry $doctrine): Response
    {
        $repo = $doctrine->getRepository(Recipe::class);

        $allRecipes = $repo->findAll();

        $resp = $serializer->serialize($allRecipes, 'json', [
            DateTimeNormalizer::FORMAT_KEY => 'd-m-y H:i',
            AbstractNormalizer::IGNORED_ATTRIBUTES => ['recipes', 'recipe']
        ]);

        return new Response(
            $resp,
            Response::HTTP_OK,
            ['content-type' => 'application/json']
        );
    }

    #[Route('/all/recipes/{id}', name: 'recipe', methods: 'GET')]
    public function getRecipe(int $id, SerializerInterface $serializer, ManagerRegistry $doctrine): Response
    {
        $repo = $doctrine->getRepository(Recipe::class);

        $selectedRecipe = $repo->find($id);

        $resp = $serializer->serialize($selectedRecipe, 'json', [
            DateTimeNormalizer::FORMAT_KEY => 'd-m-y H:i',
            AbstractNormalizer::IGNORED_ATTRIBUTES => ['recipes', 'recipe']
        ]);

        return new Response(
            $resp,
            Response::HTTP_OK,
            ['content-type' => 'application/json']
        );
    }

    #[Route('/update/recipe/{id}', name: 'mod_recipe', methods: 'PUT')]
    public function updateRecipe(): Response
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
        ]);
    }

    #[Route('/delete/recipe/{id}', name: 'del_recipe', methods: 'DELETE')]
    public function deleteRecipe(): Response
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
        ]);
    }

    #[Route('/pins', name: 'get_pins', methods: 'GET')]
    public function getPins(SerializerInterface $serializer, ManagerRegistry $doctrine): Response
    {
        $repo = $doctrine->getRepository(Recipe::class);

        $allPins = $repo->findBy(["pinned" => true]);

        $format = [];

        foreach ($allPins as $pin) {
            foreach ($pin->getImages() as $image) {
                if ($image->getMain() == true) {
                    $format[] = new RecipePin([
                        "id" => $pin->getId(),
                        "name" => $pin->getName(),
                        "cookingTime" => $pin->getCookingTime(),
                        "persons" => $pin->getPersons(),
                        "pinSize" => $pin->getPinSize(),
                        "image" => $image->getPath()
                    ]);
                }
            }
        }

        $resp = $serializer->serialize($format, 'json');

        return new Response(
            $resp,
            Response::HTTP_OK,
            ['content-type' => 'application/json']
        );
    }
}
