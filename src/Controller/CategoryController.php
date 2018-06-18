<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;

use App\Entity\Category;
use App\Repository\CategoryRepository;

class CategoryController extends Controller
{
    /**
     * @Route("/admin/categories", name="category_list")
     */
    public function CategoryList(CategoryRepository $repo)
    {
        $categoryList = $repo->findAll();
        return $this->render('category/categorylist.html.twig', [
            'controller_name' => 'CategoryController',
            'categories' => $categoryList
        ]);
    }
    
    /**
     * @Route("/admin/categories/new", name="category_create")
     */
    public function createCategory(Request $request, ObjectManager $manager, CategoryRepository $repoCategory)
    {
        $categories = $repoCategory->findAll();
        $category = new Category();
        $form = $this->createFormBuilder($category)
                    ->add('name')
                    ->getForm();

        $form ->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $manager->persist($category);
            $manager->flush();
            return $this->redirectToRoute('home');
        }

        return $this->render('category/createcategory.html.twig',[
            'controller_name' => 'CategoryController',
            'formCategory' => $form->createView(),
            'categories' => $categories
        ]);
    }

    /**
     * @Route("/admin/update-category/{id}", name="category_update")
     */
    public function updateCategory(Category $category, CategoryRepository $repoCategory, Request $request, ObjectManager $manager)
    {
        $categories = $repoCategory->findAll();
        $form = $this->createFormBuilder($category)
                    ->add('name')
                    ->getForm();

        $form ->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $manager->persist($category);
            $manager->flush();
            return $this->redirectToRoute('home');
        }

        return $this->render('category/categoryupdate.html.twig',[
            'controller_name' => 'CategoryController',
            'formCategory' => $form->createView(),
            'categories' => $categories
        ]);
    }

    /**
     * @Route("/admin/delete-category/{id}", name="category_delete")
     */
    public function deleteCategory(Category $category, Request $request, ObjectManager $manager)
    {
        $manager->remove($category);
        $manager->flush();
        return $this->redirectToRoute('home');
    }
}
