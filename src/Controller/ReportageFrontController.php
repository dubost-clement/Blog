<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Reportage;
use App\Repository\ReportageRepository;
use App\Repository\CategoryRepository;
use Symfony\Component\HttpFoundation\Request;

class ReportageFrontController extends Controller
{
    /**
     * @Route("/shooting/{slug}", name="personnel")
     */
    public function shooting(ReportageRepository $repo, CategoryRepository $repoCategory, $slug, Request $request)
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

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $reportages, 
            $request->query->getInt('page', 1),
            5
        );

        return $this->render('reportage/shooting.html.twig', [
            'controller_name' => 'ReportageFrontController',
            'reportages' => $reportages,
            'categories' => $categories,
            'name' => $slug,
            'pagination' => $pagination
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
}
