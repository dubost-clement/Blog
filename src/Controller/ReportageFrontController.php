<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Reportage;
use App\Repository\ReportageRepository;
use App\Repository\CategoryRepository;

class ReportageFrontController extends Controller
{
    /**
     * @Route("/shooting/{slug}", name="personnel")
     */
    public function shooting(ReportageRepository $repo, CategoryRepository $repoCategory, $slug)
    {
        $categories = $repoCategory->findAll();

        $category = $repoCategory->findBy(
            array('name' => $slug),
            array('id' => 'desc')
        );

        $reportages = $repo->findBy(
            array('category' => $category),
            array('id' => 'desc')
        );

        return $this->render('reportage/shooting.html.twig', [
            'controller_name' => 'ReportageFrontController',
            'reportages' => $reportages,
            'categories' => $categories,
            'name' => $slug
        ]);
    }

    /**
     * @Route("/shooting/{slug}/{id}", name="personnel_show")
     */
    public function showShooting(Reportage $reportage, CategoryRepository $repoCategory)
    {
        $categories = $repoCategory->findAll();
        return $this->render('reportage/show-shooting.html.twig',[
            'controller_name' => 'ReportageFrontController',
            'reportage' => $reportage,
            'categories' => $categories
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
