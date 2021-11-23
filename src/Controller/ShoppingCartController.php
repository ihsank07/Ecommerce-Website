<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\ShoppingCart;
use App\Controller\NotFoundHttpException;
use App\Entity\Category;
use App\Entity\Shoppingcarttotal;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException as ExceptionNotFoundHttpException;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\ShoppingCartRepository;


class ShoppingCartController extends AbstractController
{
    /**
     * @Route("/shopping/cart/", name="shopping_cart")
     */
    public function index(): Response
    {
        $entityManager = $this->getDoctrine()->getManager();

        $user = $this->getUser();

        if ($user == null) {
            return $this->redirectToRoute('app_login');
        }
        $userid = $user->getId();
        //methodları vscode görmemesine rağmen çalışıyor hatasız 
        $cheapest = $this->getDoctrine()
            ->getRepository(ShoppingCart::class)
            ->getSmallest($userid);
        $cheaporder = $this->getDoctrine()
            ->getRepository(ShoppingCart::class)
            ->getSmallNumbers($userid);
        $cheaporderin = $this->getDoctrine()
            ->getRepository(ShoppingCart::class)
            ->getTimes($userid);
        $parentcategory =   $this->getDoctrine()
            ->getRepository(Category::class);


        $urun = $this->getDoctrine()
            ->getRepository(ShoppingCart::class);
        $parentcategory =   $this->getDoctrine()
            ->getRepository(Category::class);

        $urundevam = $urun->findBy(['username' => $userid]);

        $ayakkabıkontrol = $urun->findBy(['category' => 12, 'userid'=> $userid]);

        $x = 0;
        $ayaktoplam = [];
        foreach ($ayakkabıkontrol as $ayaks) {
            $ayakucret = $ayaks->getUnitPrice();
            $ayaksayı = $ayaks->getQuantity();
            for ($i = 0; $i < $ayaksayı; $i++) {
                array_push($ayaktoplam, $ayakucret);
            }

            $x += $ayaksayı;
        }

        $total = 0;
        $totalqua = 0;
        $indirim = 0;
        foreach ($urundevam as $urunler) {
            $price = $urunler->getPrice();

            $qua = $urunler->getQuantity();

            $total += $price;
            $totalqua += $qua;
        }


        $urunhepsi = $urun->findBy(['userid' => $userid]);
        $yarıyarıya = 0;
        $deger = [];
        foreach ($urunhepsi as $uruntek) {
            $urunquan = $uruntek->getQuantity();

            if ($uruntek->getCategory() != 12) {
                $yarıyarıya += $urunquan;
                for ($i = 0; $i < $urunquan; $i++) {
                    array_push($deger, $uruntek->getUnitPrice());
                }
            }
        }

        if ($totalqua >= 1) {

            sort($ayaktoplam);
            sort($deger);
            $bolum = $x / 3;
            $bolumyarıyarıya = floor($yarıyarıya/2);
            if ($x >= 3) {
                for ($x = 0; $x < floor($bolum); $x++) {

                    $indirim += $ayaktoplam[$x];
                }
            }
      
            if ($yarıyarıya >= 2) {
                for ($i = 0; $i < $bolumyarıyarıya; $i++) {
                    $indirim += $deger[$i] / 2;
                }
            }


            $total = $total - $indirim;
            $order = new shoppingcarttotal();

            $order->setTotal($total);
            $order->setUserid($userid);

            $entityManager->persist($order);
            $entityManager->flush();
        }

        return $this->render('shopping_cart/index.html.twig', [
            'controller_name' => 'ShoppingCartController',
            'urundevam' => $urundevam,
            'user' => $user,
            'total' => $total,
            'indirim' => $indirim,
        ]);
    }

    /**
     * @Route("/shopping/cart/remove/{id}", name="product_remove")
     */
    public function remove($id){
         
        try {
          
            $em = $this->getDoctrine()->getManager();
            $product_item = $em->find(ShoppingCart::class, $id);
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
        return $this->redirectToRoute('shopping_cart');

    }
 
    
}
