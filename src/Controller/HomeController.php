<?php

namespace App\Controller;

use App\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    private $productRepository;
    private $categoryRepository;
    private $entityManager;
    private $baseUrl;

    /**
     * @param $productRepository
     * @param $categoryRepository
     * @param $entityManager
     * @param $baseUrl
     */
    public function __construct($productRepository, $categoryRepository, $entityManager, $baseUrl)
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->entityManager = $entityManager;
        $this->baseUrl = $baseUrl;
    }

    #[Route('/', name: 'home')]
    public function index(): Response
    {
        $products = $this->productRepository->findAll();
        $categories = $this->categoryRepository->findAll();
        $photoUrl = $this->baseUrl->getBaseUrl() . '/uploads/';

        return $this->render('home/index.html.twig', [
            'products' => $products,
            'categories' => $categories,
            'photo_url' => $photoUrl
        ]);
    }

    #[Route('/product/{category}', name: 'product_category')]
    public function categoryProducts(Category $category): Response
    {
        $categories = $this->categoryRepository->findAll();
        $photoUrl = $this->baseUrl->getBaseUrl() . '/uploads/';

        return $this->render('home/index.html.twig', [
            'products' => $category->getProducts(),
            'categories' => $categories,
            'photo_url' => $photoUrl
        ]);
    }
}
