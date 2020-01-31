<?php

namespace App\Controller;

use App\Entity\Forum;
use App\Form\ForumType;
use App\Repository\ForumRepository;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ForumController extends AbstractController
{
    /**
     * @Route("/forum", name="forum")
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
}
