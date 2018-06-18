<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Repository\ReportageRepository;
use App\Repository\CategoryRepository;

class HomeController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function home(ReportageRepository $repo, CategoryRepository $repoCategory)
    {
        $categories = $repoCategory->findAll();
        $lastReportages = array();

        foreach($categories as $category){
            $lastReportage = $repo->findBy(
                array('category' => $category->getId()),
                array('id' => 'desc'),
                1          
            );

            if(!empty($lastReportage)){
                array_push($lastReportages, $lastReportage[0]);
            };
            
        }

        return $this->render('reportage/home.html.twig',[
            'controller_name' => 'HomeController',
            'lastReportages' => $lastReportages,
            'categories' => $categories
        ]);
    }
}
