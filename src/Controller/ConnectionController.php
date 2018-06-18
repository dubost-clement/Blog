<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Repository\CategoryRepository;

class ConnectionController extends Controller
{
    /**
     * @Route("/connection", name="connection")
     */
    public function connectionForm(CategoryRepository $repoCategory)
    {
        $categories = $repoCategory->findAll();
        return $this->render('connection/connection.html.twig',[
            'controller_name' => 'ConnectionController',
            'categories' => $categories
        ]);
    }
}