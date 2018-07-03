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
