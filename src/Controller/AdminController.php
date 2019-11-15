<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;
use Symfony\Component\HttpFoundation\Request;


class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index()
    {
        return $this->render('admin/index.html.twig');
    }

    /**
     * @Route("/admin/add", name="add_article")
     */
    public function addArticle()
    {
        return $this->render('admin/add.html.twig');
    }

    /**
     * @Route("/admin/article/{id}", name="update_article")
     */
    public function updateArticle(int $id)
    {
        $em = $this->getDoctrine()->getManager();
        $article = $em->getRepository(Article::class)->findOneBy(array( "id" => $id));
        return $this->render('admin/update.html.twig', ["id" => $id, "article" => $article]);
    }
}
