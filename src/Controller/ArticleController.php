<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Categorie;
use App\Repository\ArticleRepository;
use App\Repository\CategorieRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ArticleController extends AbstractController
{
    /**
     * @Route("/categories", name="categories")
     */
    public function showAllCats(CategorieRepository $repo)
    {
        $cats = $repo->findAll();

        return $this->render('article/allcats.html.twig', [
            'categories' => $cats
        ]);
    }

    /**
     * @Route("/categorie-{id}", name="categorie")
     * Affichage de tous les articles d'une catégorie en fonction de celle-ci
     * Récupérée puis instanciée automatiquement par Symfony à partir de l'id passé en paramètre (merci)
     * Ensuite appel à méthode findBy() du repo (voir méthodes défaut dans repo)
     */
    public function showByCat(Categorie $cat, ArticleRepository $repo)
    {
        $articles = $repo->findBy(["categorie" => $cat]);

        return $this->render('article/bycat.html.twig', [
            'articles' => $articles,
            'categorie' => $cat
        ]);
    }

    /**
     * @Route("/article-{id}", name="article")
     */
    public function showByOne(Article $art)
    {

        return $this->render('article/byone.html.twig', [
            'article' => $art
        ]);
    }

}
