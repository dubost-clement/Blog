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
     * @Route("/", name="home")
     */
    public function home()
    {
        return $this->render('reportage/home.html.twig');
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
}
