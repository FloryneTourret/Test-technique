<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        return $this->render('index/index.html.twig', ['page' => 1]);
    }

    /**
     * @Route("/page/{page}", name="page")
     */
    public function page(int $page)
    {
        return $this->render('index/index.html.twig', ['page' => $page]);
    }

    /**
     * @Route("/article/{id}", name="article")
     */
    public function article(int $id)
    {
        return $this->render('index/article.html.twig');
    }
}
