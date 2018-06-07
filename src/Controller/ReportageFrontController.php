<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Reportage;
use App\Repository\ReportageRepository;

class ReportageFrontController extends Controller
{
    /**
     * @Route("/personnel", name="personnel")
     */
    public function shooting(ReportageRepository $repo)
    {
        $reportages = $repo->findByCategory('personnel');
        return $this->render('reportage/shooting.html.twig', [
            'controller_name' => 'ReportageFrontController',
            'reportages' => $reportages
        ]);
    }

    /**
     * @Route("/personnel/{id}", name="personnel_show")
     */
    public function showShooting(Reportage $reportage)
    {
        return $this->render('reportage/show-shooting.html.twig',[
            'controller_name' => 'ReportageFrontController',
            'reportage' => $reportage
        ]);
    }

    /**
     * @Route("/sport", name="sport")
     */
    public function sport(ReportageRepository $repo)
    {
        $reportageSport = $repo->findByCategory('sport');
        return $this->render('reportage/sport.html.twig',[
            'controller_name' => 'ReportageFrontController',
            'sports' => $reportageSport
        ]);
    }
    
    /**
     * @Route("/sport/{id}", name="sport_show")
     */
    public function showSport(Reportage $reportage)
    {
        return $this->render('reportage/show-sport.html.twig',[
            'controller_name' => 'ReportageFrontController',
            'sport' => $reportage
        ]);
    }    
}
