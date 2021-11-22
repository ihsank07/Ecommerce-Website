<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use App\Form\CategoryType;
use PhpParser\Node\Stmt\TryCatch;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use function PHPUnit\Framework\throwException;

class CategoryController extends AbstractController
{
    /**
     * @Route("/admin/category", name="admin_category")
     */
    public function index(): Response
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository(Category::class);
        $items = $repository->findAll();

        return $this->render('admin/categoryadmin/index.html.twig', [
            'controller_name' => 'CategoryController',
            'items' => $items,


        ]);
    }
    /**
     * @Route("/admin/category/create", name="admin_category_create" )
     */
    public function create(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $category_item = new Category();


        $form = $this->createForm(CategoryType::class, $category_item);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {

            $em->persist($category_item);
            $em->flush();

            $this->addFlash('success', "İçerik başarıyla kaydedildi!");
            return $this->redirectToRoute('admin_category');
        }


        return $this->render('admin/categoryadmin/create.html.twig', [
            'form' => $form->createView()
        ]);
    }
    /**
     * @Route("/admin/category/remove/{id}", name="category_remove")
     */
    public function remove($id)
    {
        try {

            $em = $this->getDoctrine()->getManager();
            $category_item = $em->find(Category::class, $id);
            if (!$category_item) {
                throw new NotFoundHttpException("Kategori Yok");
            }
            $em->remove($category_item);
            $em->flush();
            $this->addFlash("success", "Kategori Başarıyla Silindi");
        } catch (\Exception $e) {
            $this->addFlash("danger", "Kategori Silinemedi");
        }
        return $this->redirectToRoute('admin_category');
    }
}
