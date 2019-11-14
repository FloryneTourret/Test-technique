<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Form\ArticleType;
use App\Entity\Article;
use App\Entity\User;


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
    public function addArticle(Request $request)
    {
        $article = new Article();
        $form = $this->createForm(ArticleType::class, $article);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $content_article = $request->request->get('article');
            $article->setTitle($content_article['title']);
            $article->setDescription($content_article['description']);

            $article->addAuthor($this->getUser());
            
            $em->persist($article);
            $em->flush();
            die;

            return $this->redirectToRoute('admin');
        }

        return $this->render(
            'admin/add.html.twig',
            array('form' => $form->createView())
        );
    }
}
