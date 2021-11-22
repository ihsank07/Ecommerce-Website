<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Product;
use App\Form\AddToCartType;
use Symfony\Component\HttpFoundation\Request;
use App\Manager\CartManager;
use App\Form\ShoppingCartType;
use App\Entity\ShoppingCart;
use App\Entity\User;


class ProductController extends AbstractController
{
    /**
     * @Route("/product/{id}", name="product.detail")
     */
    public function detail(Product $product, Request $request): Response
    {

        $entityManager = $this->getDoctrine()->getManager();

        $repository = $this->getDoctrine()->getRepository(ShoppingCart::class);
        $repositorypro = $this->getDoctrine()->getRepository(Product::class);
        $userrepo = $this->getDoctrine()->getRepository(User::class);

        $form = $this->createForm(ShoppingCartType::class);
        $form->handleRequest($request);

        //userbilgileri

        $user = $this->getUser();

        if ($form->isSubmitted() && $form->isValid()) {
            //giriş yapmamışsa yönlendir
            if ($this->getUser() == null) {
                return $this->redirectToRoute('app_login');
            }
            $user = $this->getUser();

            $repos = $repository->findAll();

            $userid = $this->getUser()->getId();
            //sepet veritabanındaki kullanıcılar arraya bastırılır
            $isim = [];
            foreach ($repos as $repot) {
                $name = $repot->getUsername()->getId();

                array_push($isim, $name);
            }
            $item = $form->getData();
            $number = $item->getQuantity();
            $proid = $product->getId();
            $prourun = $repository->findOneBy(['userid' => $userid, 'productid' => $proid]);
            $totalprice = $product->getPrice() * $number;
            $depo = 0;


            //kullanıcı arrayde yoksa sepeti boştur normal ekle
            if (in_array($userid, $isim) == false) {
                $cart  = new ShoppingCart();
                $cart->setUnitprice($product->getPrice());
                $cart->setQuantity($number);
                $cart->setCreatedAt(new \DateTime('now'));
                $cart->setUsername($this->getUser());
                $cart->setUserid($this->getUser()->getId());
                $cart->setProductname($product->getName());
                $cart->setPrice($totalprice);
                $cart->addProductinbasket($product);


                $procats = $product->getCategory();
                $categoryarray = [];
                foreach ($procats as $procat) {
                    $id = $procat->getID();
                    array_push($categoryarray, $id);
                }

                $cart->setCategory($categoryarray[0]);

                $cart->setProductid($product->getId());

                $entityManager->persist($cart);
                $entityManager->flush();


                return $this->redirectToRoute('shopping_cart');
            } else {
                if ($prourun != null) {


                    $isim = $product->getShoppingCart();

                    $past = $prourun->getQuantity();

                    $prourun->setQuantity($past + $number);

                    $total = $past + $number;
                    $totalprice = $product->getPrice() * $total;
                    $prourun->setPrice($totalprice);
                    $entityManager->persist($prourun);
                    $entityManager->flush();

                    return $this->redirectToRoute('shopping_cart');
                } else {
                    $cart  = new ShoppingCart();
                    $cart->setQuantity($number);
                    $cart->setCreatedAt(new \DateTime('now'));
                    $cart->setUsername($this->getUser());
                    $cart->setProductname($product->getName());
                    $cart->setPrice($product->getPrice());
                    $cart->setProductname($product->getName());
                    $procats = $product->getCategory();
                    $categoryarray = [];
                    foreach ($procats as $procat) {
                        $id = $procat->getID();
                        array_push($categoryarray, $id);
    
                    }
    
                    $cart->setCategory($categoryarray[0]);
                    
                    $cart->setPrice($totalprice);
                    $cart->addProductinbasket($product);
                    $cart->setProductid($product->getId());
                    $cart->setUserid($userid);
                    $cart->setUnitprice($product->getPrice());
                    $entityManager->persist($cart);
                    $entityManager->flush();

                    return $this->redirectToRoute('shopping_cart');
                }
            }
        }



        return $this->render('product/detail.html.twig', [
            'controller_name' => 'ProductController',

            'product' => $product,
            'form' => $form->createView(),
            'user' => $user
        ]);
    }
}
