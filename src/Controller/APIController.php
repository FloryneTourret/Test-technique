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
                    'image' => "assets/img/phone.jpg",
                ]
            );
        return $this->json($articles);
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
            "data" => [
                [
                    'id' => "1",
                    'title' => "titre",
                    'desc' => "description",
                    'author' => "auteur",
                    'create' => "date de creation",
                    'modif' => "date de modification",
                    'image' => "assets/img/phone.jpg",
                ],
                [
                    'id' => "2",
                    'title' => "titre",
                    'desc' => "description",
                    'author' => "auteur",
                    'create' => "date de creation",
                    'modif' => "date de modification",
                    'image' => "assets/img/phone.jpg",
                ],
                [
                    'id' => "3",
                    'title' => "titre",
                    'desc' => "description",
                    'author' => "auteur",
                    'create' => "date de creation",
                    'modif' => "date de modification",
                    'image' => "assets/img/phone.jpg",
                ]
                ],
            "nb_total" => 5
        );
        return $this->json($articles);
    }


}
