<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use App\Repository\CategoryRepository;
use App\Repository\UserRepository;

class ContactController extends Controller
{
    /**
     * @Route("/contact", name="contact")
     */
    public function contactForm(Request $request, \Swift_Mailer $mailer, CategoryRepository $repoCategory, UserRepository $repoUser)
    {
        $categories = $repoCategory->findAll();

        $user = $repoUser->findAll();
        $userEmail = $user[0]->getEmail();

        $form = $this->createFormBuilder()
                    ->add('email', EmailType::class)
                    ->add('message', TextareaType::class)
                    ->add('envoyer', SubmitType::class)
                    ->getForm();

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            
            $data = $form->getData();
            $message = (new \Swift_Message)
                    ->setSubject('nouveau mail de votre site')
                    ->setFrom($data['email'])
                    ->setTo($userEmail)
                    ->setBody($form->getData()['message'],'text/plain')
            ;
            $mailer->send($message);
            return $this->redirectToRoute('home');
        }

        return $this->render('contact/contact.html.twig',[
            'controller_name' => 'ContactController',
            'emailForm' => $form->createView(),
            'categories' => $categories
        ]);
    }
}