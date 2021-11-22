<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Order;
use Symfony\Component\HttpFoundation\Request;

class OrderController extends AbstractController
{
    /**
     * @Route("/admin/order", name="admin_order")
     */
    public function index(): Response
    {


        $em = $this->getDoctrine()->getManager();
        $repository =$em->getRepository(Order::class);
        $items = $repository->findBy(['status'=> 0]);

        


        return $this->render('admin/order/index.html.twig', [
            'controller_name' => 'OrderController',
            'items' => $items
        ]);
    }
    /**
     * @Route("/admin/order/confirm", name="admin_order_confirm")
     */
    public function confirm(): Response
    {

        $em = $this->getDoctrine()->getManager();
        $repository =$em->getRepository(Order::class);
        $items = $repository->findBy(['status'=> 1]);


        return $this->render('admin/order/confirm.html.twig', [
            'controller_name' => 'OrderController',
            'items'=>$items
        ]);
    }    
    /**
     * @Route("/admin/order/confirm/{id}", name="confirm_option")
     */
    public function confirmoption($id){
        
    
            $em = $this->getDoctrine()->getManager();
            $category_item = $em->find(Order::class, $id);
            $category_item->setStatus(1);
  
            $em->flush();
        
            return $this->redirectToRoute('admin_order');

    }


    
}
