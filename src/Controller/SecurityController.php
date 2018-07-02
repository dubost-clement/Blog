<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use App\Repository\CategoryRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SecurityController extends Controller
{
    /**
     * @Route("/inscription", name="security_registration")
     */
    public function registration(CategoryRepository $repoCategory, Request $request, ObjectManager $manager, UserPasswordEncoderInterface $encoder)
    {
        $categories = $repoCategory->findAll();
        $user = new User();

        $form = $this->createForm(RegistrationType::class, $user);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $hash = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($hash);
            $manager->persist($user);
            $manager->flush();
        }

        return $this->render('security/registration.html.twig',[
            'form' => $form->createView(),
            'categories' => $categories
        ]);
    }

    /**
     * @Route("/connexion", name="security_login")
     */
    public function login(CategoryRepository $repoCategory)
    {
        $categories = $repoCategory->findAll();

        return $this->render('security/login.html.twig',[
            'categories' => $categories,
        ]);
    }
    /**
     * @Route("/deconnexion", name="security_logout")
     */
    public function logout()
    {

    }
}
