<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use App\Entity\Reportage;
use App\Entity\Category;
use App\Repository\ReportageRepository;

class ReportageBackController extends Controller
{
    /**
     * @Route("/admin/new-reportage", name="reportage_create")
     */
    public function createReportage(Request $request, ObjectManager $manager)
    {
        $reportage = new Reportage();
        $form = $this->createFormBuilder($reportage)
                    ->add('title')
                    ->add('content')
                    ->add('image')
                    ->add('category', EntityType::class,[
                        'class' => Category::class,
                        'choice_label' => 'name'
                    ])
                    ->getForm();

        $form ->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $reportage->setCreatedAt(new \DateTime());
            $manager->persist($reportage);
            $manager->flush();
            return $this->redirectToRoute('home');
        }

        return $this->render('reportage/edit/create.html.twig',[
            'controller_name' => 'ReportageBackController',
            'formReportage' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/liste-reportage", name="reportage_list")
     */
    public function updateList(ReportageRepository $repo)
    {
        $reportageList = $repo->findAll();
        return $this->render('reportage/edit/updatelist.html.twig',[
            'controller_name' => 'ReportageBackController',
            'updateList' => $reportageList
        ]);
    }

    /**
     * @Route("/admin/update-reportage/{id}", name="reportage_update")
     */
    public function updateReportage(Reportage $reportage, Request $request, ObjectManager $manager)
    {
        $form = $this->createFormBuilder($reportage)
                    ->add('title')
                    ->add('content')
                    ->add('image')
                    ->add('category', EntityType::class,[
                        'class' => Category::class,
                        'choice_label' => 'name'
                    ])
                    ->getForm();

        $form ->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $manager->persist($reportage);
            $manager->flush();
            return $this->redirectToRoute('home');
        }

        return $this->render('reportage/edit/updatereportage.html.twig',[
            'controller_name' => 'ReportageBackController',
            'formReportage' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/delete-reportage/{id}", name="reportage_delete")
     */
    public function deleteReportage(Reportage $reportage, Request $request, ObjectManager $manager)
    {
        $manager->remove($reportage);
        $manager->flush();
        return $this->redirectToRoute('home');
    }
}