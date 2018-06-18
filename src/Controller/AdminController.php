<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Repository\CategoryRepository;

class AdminController extends Controller
{
    /**
     * @Route("/admin", name="admin")
     */
    public function adminAction(CategoryRepository $repoCategory)
    {
        $categories = $repoCategory->findAll();
        return $this->render('admin/admin.html.twig',[
            'controller_name' => 'AdminController',
            'categories' => $categories
        ]);
    }
}