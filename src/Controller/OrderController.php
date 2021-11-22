<?php

namespace App\Controller;

use App\Entity\ShoppingCart;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Form\OrderType;
use App\Entity\User;
use App\Entity\Order;
use App\Entity\OrderProduct;
use App\Entity\Shoppingcarttotal;
use App\Repository\ShoppingCartRepository;

class OrderController extends AbstractController
{
    /**
     * @Route("/order", name="order")
     */
    public function index(Request $request): Response
    {
        $userid = $this->getUser();
       
        $form = $this->createForm(OrderType::class);
        
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $item = $form->getData();
            $adress = $item->getAddress();
            $city = $item->getCity();
            $postcode = $item->getPostCode();
            $paymentmethod = $item->getPaymentMethod();

            $entityManager = $this->getDoctrine()->getManager();
            $useride = $this->getUser()->getID();
            $em = $this->getDoctrine()->getManager();
            $products = $this->getDoctrine()
            ->getRepository(ShoppingCart::class);



            $sct = $this->getDoctrine()
            ->getRepository(Shoppingcarttotal::class);   

            $order = new Order();
            $orderpro = new OrderProduct();
  
            $scturun = $sct->findOneBy(['userid' => $useride]);
            

            $order->setAddress($adress);
            $order->setCity($city);
            $order->setPostcode($postcode);
            $order->setPaymentmethod($paymentmethod);
            $order->setPrice($scturun->getTotal());



            $x = 0;
            $productupdate = $products->findBy(['userid' => $useride ]);
            foreach($productupdate as $product){
                
                $orderpro->setProductName($product->getProductname());
                $orderpro->setQuantity($product->getQuantity());
                $orderpro->setUserid($useride);
                $orderpro->setBasketno($x);

            }

            $x++;
            
            $em->persist($order);
            $em->persist($orderpro);
            $em->flush();
            
            $products = $this->getDoctrine()
            ->getRepository(ShoppingCart::class);


            $delete = $products->findBy(['userid' => $userid]);
            foreach ($delete as $deleteall) {
                $entityManager->remove($deleteall);
            }

            $entityManager->flush();

            return $this->redirectToRoute('home');
        }


        return $this->render('order/index.html.twig', [
            'controller_name' => 'OrderController',
            
        
            'form' => $form->createView(),
            'user' => $userid,

        ]);
    }
}
