<?php

namespace App\Controller;

use App\Entity\Post;
use App\Entity\Forum;
use App\Entity\Sujet;
use App\Form\PostType;
use App\Form\ForumType;
use App\Form\SujetType;
use App\Repository\PostRepository;
use App\Repository\ForumRepository;
use App\Repository\SujetRepository;
use DateTime;
use DateTimeZone;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ForumController extends AbstractController
{
    /**
     * @Route("/forums", name="forums")
     */
    public function showAllForums(Request $request, ObjectManager $manager, ForumRepository $repo)
    {
        $forum = new Forum();
        $form = $this->createForm(ForumType::class, $forum);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            $manager->persist($forum);
            $manager->flush();
            return $this->redirectToRoute('forum');
        }

        $forums = $repo->findAll();

        return $this->render('forum/forum.html.twig', [
            'forums' => $forums,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/forum-{id}", name="forum")
     */
    public function showByForum(int $id, Request $request, ObjectManager $manager, Forum $forum, SujetRepository $repo)
    {
        $sujet = new Sujet();
        $form = $this->createForm(SujetType::class, $sujet);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            $sujet->setForum($forum);
            $manager->persist($sujet);
            $manager->flush();
            return $this->redirectToRoute('forum', ['id' => $id]);
        }

        $sujets = $repo->findBy(["forum" => $forum]);

        return $this->render('forum/byforum.html.twig', [
            'sujets' => $sujets,
            'forum' => $forum,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/sujet-{id}", name="sujet")
     */
    public function showSujet(int $id, Request $request, ObjectManager $manager, Sujet $sujet, PostRepository $repo)
    {
        $post = new Post();
        $form = $this->createForm(PostType::class, $post);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            
            $post->setCreatedAt(new DateTime("now", new DateTimeZone('europe/paris')));
            $post->setSujet($sujet);
            
            $manager->persist($post);
            $manager->flush();
            return $this->redirectToRoute('sujet', ['id' => $id]);
        }

        $posts = $repo->findBy(["sujet" => $sujet]);

        return $this->render('forum/bysujet.html.twig', [
            'posts' => $posts,
            'sujet' => $sujet,
            'form' => $form->createView()
        ]);
    }
}
