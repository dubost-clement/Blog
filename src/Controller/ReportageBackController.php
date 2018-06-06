<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;

use App\Entity\Reportage;
use App\Repository\ReportageRepository;

class ReportageBackController extends Controller
{
    /**
     * @Route("/admin/new", name="reportage_create")
     */
    public function createReportage(Request $request, ObjectManager $manager)
    {
        $reportage = new Reportage();
        $form = $this->createFormBuilder($reportage)
                    ->add('title')
                    ->add('content')
                    ->add('image')
                    ->getForm();
        return $this->render('reportage/edit/create.html.twig',[
            'formReportage' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/list", name="reportage_list")
     */
    public function updateList(ReportageRepository $repo)
    {
        $reportageList = $repo->findAll();
        return $this->render('admin/updatelist.html.twig',[
            'updateList' => $reportageList
        ]);
    }

    /**
     * @Route("/admin/update/{id}", name="reportage_update")
     */
    public function updateReportage()
    {
        
    }
}