<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Controller\Admin\CategoryController;
use App\Controller\Admin\ProductController;
use App\Entity\Category;
use App\Entity\User;

use App\Entity\Product;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        $em = $this->getDoctrine()->getManager();
        $product = $em->getRepository(Product::class)->findAll();
        $category = $em->getRepository(Category::class)->findAll();
        $user = $this->getUser();


        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'product' => $product,
            'category' => $category,
            'user' => $user,
      
        ]);
    }
    /**
     * @Route("/category/{id}", name="category.detail")
     */
    public function categoryDetail(Category $category): Response
    {
        $pro  = $category->getProduct();

        $categorychild  = $category->getChildren();

        $em = $this->getDoctrine()->getManager();

        $product = $em->getRepository(Product::class)->findAll();

        $category = $em->getRepository(Category::class)->findAll();

        $user = $this->getUser();
     

        return $this->render('home/detail.html.twig', [
            'controller_name' => 'HomeController',
            'product' => $product,
            'category' => $category,
            'user' => $user,
            'pro' => $pro,
            'children' => $categorychild
        ]);
    }
    /**
     * @Route("/category/{id}", name="children.detail")
     */
    public function childrendetail(Category $category): Response
    {
        $pro  = $category->getProduct();

        $categorychild  = $category->getChildren();

        $em = $this->getDoctrine()->getManager();

        $product = $em->getRepository(Product::class)->findAll();

        $category = $em->getRepository(Category::class)->findAll();

        $user = $this->getUser();

        return $this->render('home/catdetail.html.twig', [
            'controller_name' => 'HomeController',
            'product' => $product,
            'category' => $category,
            'user' => $user,
            'pro' => $pro,
            'children' => $categorychild
        ]);
    }
}
