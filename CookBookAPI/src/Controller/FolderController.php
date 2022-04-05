<?php

namespace App\Controller;

use App\Entity\Folder;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
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
}
