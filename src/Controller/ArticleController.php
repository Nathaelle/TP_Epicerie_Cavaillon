<?php

namespace App\Controller;

use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    /**
     * @Route("/categories", name="categories")
     */
    public function indexCat(CategorieRepository $repo)
    {
        $cats = $repo->findAll();

        return $this->render('article/index.html.twig', [
            'categories' => $cats
        ]);
    }
}
