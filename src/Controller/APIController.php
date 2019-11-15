<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;
use App\Entity\User;

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
        $article = new Article();
        $em = $this->getDoctrine()->getManager();

        if(!empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['picture']) && !empty($_POST['username']))
        {

            $content_article = $_POST;
            
            $article->setTitle($content_article['title']);
            $article->setDescription($content_article['description']);
            $article->setPicture($content_article['picture']);
            $article->setCreationDate(new \DateTime('now'));
            $article->setModificationDate(new \DateTime('now'));
            
            $user = $em->getRepository(User::class)->findOneBy(array( "username" => $content_article['username']));
            $article->setAuthor($user);
            
            $em->persist($article);
            $em->flush();
            
            return $this->json(["id" => $article->getId()]);
        }
        else{
            return $this->json(["error" => "Please fill all the fields"]);
        }
    }

    /**
     * @Route("/api/v1/article/{id}", methods={"PUT"})
     */
    public function put_article(int $id)
    {
        $em = $this->getDoctrine()->getManager();
        parse_str(file_get_contents("php://input"), $_PUT);
        if(!empty($_PUT['title']) && !empty($_PUT['description']) && !empty($_PUT['picture']) && !empty($_PUT['username']) && !empty($_PUT['id']))
        {

            $content_article = $_PUT;
            $article = $em->getRepository(Article::class)->findOneBy(array( "id" => $content_article['id']));

            
            $article->setTitle($content_article['title']);
            $article->setDescription($content_article['description']);
            $article->setModificationDate(new \DateTime('now'));

            $em->persist($article);
            $em->flush();
            
            return $this->json(["id" => $article->getId()]);
        }
        else{
            return $this->json(["error" => "Please fill all the fields"]);
        }
    }

    /**
     * @Route("/api/v1/article/{id}", methods={"DELETE"})
     */
    public function delete_article(int $id)
    {
        
        $em = $this->getDoctrine()->getManager();
        $article = $em->getRepository(Article::class)->findOneBy(["id" => $id]);
        $em->remove($article);
        $em->flush();
        return $this->json(["success" => "Removed"]);
    }

    /**
     * @Route("/api/v1/articles/{page}", methods={"GET"})
     */
    public function get_articles(int $page)
    {
        $em = $this->getDoctrine()->getManager();
        $list_articles = $em->getRepository(Article::class)->findBy(array(), null, 10, 10 * ($page - 1));
        dump($list_articles);die;
        return $this->json($list_articles);
    }


}
