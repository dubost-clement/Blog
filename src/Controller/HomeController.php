<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Repository\ReportageRepository;

class HomeController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function home(ReportageRepository $repo)
    {
        $lastSport = $repo->findBy(
            array('category' => 'sport'),
            array('id' => 'desc'),
            1          
        );

        $lastShooting = $repo->findBy(
            array('category' => 'personnel'),
            array('id' => 'desc'),
            1
        );

        return $this->render('reportage/home.html.twig',[
            'controller_name' => 'HomeController',
            'lastSport' => $lastSport,
            'lastShooting' => $lastShooting
        ]);
    }
}
