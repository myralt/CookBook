<?php

namespace App\Controller;

use App\Entity\Product;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class ProductController extends AbstractController
{
    #[Route('/all/products', name: 'all_products', methods: 'GET')]
    public function getAllProducts(SerializerInterface $serializer, ManagerRegistry $doctrine): Response
    {
        $repo = $doctrine->getRepository(Product::class);

        $allProducts = $repo->findAll();

        $resp = $serializer->serialize($allProducts, 'json');

        return new Response(
            $resp,
            Response::HTTP_OK,
            ['content-type' => 'application/json']
        );
    }
}
