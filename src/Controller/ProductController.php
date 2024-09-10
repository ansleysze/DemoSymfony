<?php

namespace App\Controller;


use App\Entity\Product;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
* @Route("/api/products", name="product_api")
*/
class ProductController extends AbstractController
{
   /**
    * @Route("/", name="index", methods={"GET"})
    */
   public function index(ProductRepository $productRepository, SerializerInterface $serializer): Response
   {
       $products = $productRepository->findAll();
       $data = $serializer->serialize($products, 'json');

       return new Response($data, 200, ['Content-Type' => 'application/json']);
   }


   /**
    * @Route("/{id}", name="show", methods={"GET"})
    */
   public function show(Product $product, SerializerInterface $serializer): Response
   {
       $data = $serializer->serialize($product, 'json');
       return new Response($data, 200, ['Content-Type' => 'application/json']);
   }


   /**
    * @Route("/", name="create", methods={"POST"})
    */
   public function create(Request $request, EntityManagerInterface $entityManager, SerializerInterface $serializer): Response
   {
       $requestData = $request->getContent();

       $product = $serializer->deserialize($requestData, Product::class, 'json');

       if (!$product->getName() || !$product->getDescription() || !$product->getPrice()) {
           return new JsonResponse(['error' => 'Missing required fields'], 400);
       }

       $entityManager->persist($product);
       $entityManager->flush();

       $data = $serializer->serialize($product, 'json');

       return new JsonResponse(['message' => 'Product created!', 'product' => json_decode($data)], 201);
   }


   /**
    * @Route("/{id}", name="update", methods={"PUT"})
    */
   public function update(Product $product, Request $request, EntityManagerInterface $entityManager, SerializerInterface $serializer): Response
   {
       $requestData = $request->getContent();
       $updatedProduct = $serializer->deserialize($requestData, Product::class, 'json');

       $product->setName($updatedProduct->getName());
       $product->setDescription($updatedProduct->getDescription());
       $product->setPrice($updatedProduct->getPrice());

       $entityManager->flush();

       return new Response('Product updated!', 200);
   }


   /**
    * @Route("/{id}", name="delete", methods={"DELETE"})
    */
   public function delete(Product $product, EntityManagerInterface $entityManager): Response
   {
       $entityManager->remove($product);
       $entityManager->flush();

       return new Response('Product deleted!', 200);
   }


   /**
    * @Route("/search/{id}", name="search_by_id", methods={"GET"})
    */
   public function findById(ProductRepository $productRepository, int $id, SerializerInterface $serializer): Response
   {
       $product = $productRepository->find($id);

       if (!$product) {
           return new JsonResponse(['error' => 'Product not found'], 404);
       }

       $data = $serializer->serialize($product, 'json');

       return new Response($data, 200, ['Content-Type' => 'application/json']);
   }


   /**
    * @Route("/search/price/{price}", name="search_by_price", methods={"GET"})
    */
   public function findByPrice(ProductRepository $productRepository, float $price, SerializerInterface $serializer): Response
   {
       $products = $productRepository->findBy(['price' => $price]);

       if (!$products) {
           return new JsonResponse(['error' => 'Products not found'], 404);
       }

       $data = $serializer->serialize($products, 'json');

       return new Response($data, 200, ['Content-Type' => 'application/json']);
   }


   /**
    * @Route("/search/description/{description}", name="search_by_description", methods={"GET"})
    */
   public function findByDescription(ProductRepository $productRepository, string $description, SerializerInterface $serializer): Response
   {
       $products = $productRepository->findBy(['description' => $description]);

       if (!$products) {
           return new JsonResponse(['error' => 'Products not found'], 404);
       }

       $data = $serializer->serialize($products, 'json');

       return new Response($data, 200, ['Content-Type' => 'application/json']);
   }


   /**
    * @Route("/search/price-greater-than/{price}", name="search_by_price_greater_than", methods={"GET"})
    */
   public function findByPriceGreaterThan(ProductRepository $productRepository, float $price, SerializerInterface $serializer): Response
   {
       $products = $productRepository->findByPriceGreaterThan($price);

       if (!$products) {
           return new JsonResponse(['error' => 'Products not found'], 404);
       }

       $data = $serializer->serialize($products, 'json');

       return new Response($data, 200, ['Content-Type' => 'application/json']);
   }
}