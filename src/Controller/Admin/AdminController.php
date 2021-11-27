<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {

        $user = $this->getUser();
        if ($user == null) {
            return $this->redirectToRoute('app_login');
        }





        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
            'user' => $user,
        ]);
    }
}
