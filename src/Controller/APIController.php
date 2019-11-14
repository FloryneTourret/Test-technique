<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class APIController extends AbstractController
{
    /**
     * @Route("/api/v1", name="api")
     */
    public function index()
    {
        return $this->render('api/index.html.twig');
    }

    /**
     * @Route("/api/v1/article", methods={"POST"})
     */
    public function post_article()
    {
        return $this->redirectToRoute('admin');
    }

    /**
     * @Route("/api/v1/article/{id}", methods={"GET"})
     */
    public function get_article(int $id)
    {
        $articles = array(
                [
                    'title' => "titre",
                    'desc' => "description",
                    'author' => "auteur",
                    'create' => "date de creation",
                    'modif' => "date de modification",
                    'image' => "path image",
                ]
            );
        return $this->json(['data' => $articles]);
    }

    /**
     * @Route("/api/v1/article/{id}", methods={"PUT"})
     */
    public function put_article(int $id)
    {
        return $this->redirectToRoute('admin');
    }

    /**
     * @Route("/api/v1/article/{id}", methods={"DELETE"})
     */
    public function delete_article(int $id)
    {
        return $this->redirectToRoute('admin');
    }

    /**
     * @Route("/api/v1/articles/{page}", methods={"GET"})
     */
    public function get_articles(int $page)
    {
        $articles = array(
                [
                    'title' => "titre",
                    'desc' => "description",
                    'author' => "auteur",
                    'create' => "date de creation",
                    'modif' => "date de modification",
                    'image' => "path image",
                ],
                [
                    'title' => "titre",
                    'desc' => "description",
                    'author' => "auteur",
                    'create' => "date de creation",
                    'modif' => "date de modification",
                    'image' => "path image",
                ],
                [
                    'title' => "titre",
                    'desc' => "description",
                    'author' => "auteur",
                    'create' => "date de creation",
                    'modif' => "date de modification",
                    'image' => "path image",
                ]
            );
        return $this->json(['data' => $articles]);
    }


}
