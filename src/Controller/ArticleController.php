<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    /**
     * @Route("/categories", name="categories")
     */
    public function indexCat()
    {
        return $this->render('article/index.html.twig', [
            'categories' => [
                'Miel',
                'Fromages',
                'Charcuterie',
                'Idées - cadeaux',
                'Huiles d\'olive', 
                'Fruits'
            ]
        ]);
    }
}
