<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Reportage;
use App\Repository\ReportageRepository;

class ReportageController extends Controller
{
    /**
     * @Route("/reportage", name="reportage")
     */
    public function index(ReportageRepository $repo)
    {
        $reportages = $repo->findall();
        return $this->render('reportage/index.html.twig', [
            'controller_name' => 'ReportageController',
            'reportages' => $reportages
        ]);
    }

    /**
     * @Route("/reportage/{id}", name="reportage_show")
     */
    public function show(Reportage $reportage)
    {
        return $this->render('reportage/show.html.twig',[
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
            'sports' => $reportageSport
        ]);
    }

    /**
     * @Route("/", name="home")
     */
    public function home(ReportageRepository $repo)
    {
        $reportageSport = $repo->findByCategory('sport');
        return $this->render('reportage/home.html.twig');
    }
}
