<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ReportageController extends Controller
{
    /**
     * @Route("/reportage", name="reportage")
     */
    public function index()
    {
        return $this->render('reportage/index.html.twig', [
            'controller_name' => 'ReportageController',
        ]);
    }

    /**
     * @Route("/", name="home")
     */
    public function home()
    {
        return $this->render('reportage/home.html.twig');
    }
}
