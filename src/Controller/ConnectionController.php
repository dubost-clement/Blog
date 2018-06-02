<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ConnectionController extends Controller
{
    /**
     * @Route("/connection", name="connection")
     */
    public function connectionForm()
    {
        return $this->render('connection/connection.html.twig',[
            'controller_name' => 'ConnectionController',
        ]);
    }
}