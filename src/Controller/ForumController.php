<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ForumController extends AbstractController
{
    /**
     * @Route("/forum", name="forum")
     */
    public function showAllForums()
    {
        return $this->render('forum/forum.html.twig', [
            'forums' => ['czhaemiuah', 'sdbcqsl', 'dqomhCQOM', 'csudhcudchooz czc zc', 'csoh qcoiefzh']
        ]);
    }
}
