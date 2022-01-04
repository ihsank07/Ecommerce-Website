<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use App\Form\ProductFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException ;

class ProductController extends AbstractController
{
    /**
     * @Route("/admin/product", name="admin_product")
     */
    public function index(): Response
    {   
        $em = $this->getDoctrine()->getManager();
        $repository =$em->getRepository(Product::class);
        $items = $repository->findAll();
        $user = $this->getUser();

        return $this->render('admin/productadmin/index.html.twig', [
            'controller_name' => 'ProductController',
            'items' => $items,
            'user' => $user,

        ]);
    }
    /**
     * @Route("/admin/product/create", name="admin_product_create")
     */
    public function create(Request $request):Response
    {
        $em = $this->getDoctrine()->getManager();
        $product_item=new Product();

        $user = $this->getUser();
        $form = $this->createForm(ProductFormType::class,$product_item);
        $form->handleRequest($request);
     
    
        if($form->isSubmitted() && $form->isValid()) 
        {

        $em->persist($product_item);
        $em->flush();

        $this->addFlash('success',"İçerik başarıyla kaydedildi!");
        return $this->redirectToRoute('admin_product');
        }
    

        return $this->render('admin/productadmin/create.html.twig',[
            'form'=>$form->createView(),
            'user' => $user,
        ]);


    }


    /**
     * @Route("/admin/product/remove/{id}", name="admin_product_remove")
     */
    public function remove($id){
         
        try {
          
            $em = $this->getDoctrine()->getManager();
            $product_item = $em->find(Product::class, $id);
            if(!$product_item)
            {
            throw new NotFoundHttpException("Kategori Yok");
            }
            $em->remove($product_item);
            $em->flush();
            $this->addFlash("success" , "Kategori Başarıyla Silindi");


        } catch (\Exception $e) {
            $this->addFlash("danger", "Kategori Silinemedi");
        }
        return $this->redirectToRoute('admin_product');

    }

}