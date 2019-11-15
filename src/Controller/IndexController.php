<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Article;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        $page = 1;
        $em = $this->getDoctrine()->getManager();
        $list_articles = $em->getRepository(Article::class)->findBy(array(), null, 6, 6 * ($page - 1));
        $total = ceil(count($em->getRepository(Article::class)->findAll()) / 6);
        return $this->render('index/index.html.twig', ['page' => $page, "list_articles" => $list_articles, "total" => $total]);
    }

    /**
     * @Route("/page/{page}", name="page")
     */
    public function page(int $page)
    {
        $em = $this->getDoctrine()->getManager();
        $list_articles = $em->getRepository(Article::class)->findBy(array(), null, 6, 6 * ($page - 1));
        $total = ceil(count($em->getRepository(Article::class)->findAll()) / 6);
        return $this->render('index/index.html.twig', ['page' => $page, "list_articles" => $list_articles, "total" => $total]);
    }

    /**
     * @Route("/article/{id}", name="article")
     */
    public function article(int $id)
    {
        $em = $this->getDoctrine()->getManager();
        $article = $em->getRepository(Article::class)->findOneBy(["id" => $id]);
        return $this->render('index/article.html.twig', array("article" => $article));
    }
}
