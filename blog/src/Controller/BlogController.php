<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    /**
     * @Route("/blog", name="blog")
     */
    public function index(ArticleRepository $articleRepository)
    {
        $articles = $articleRepository->findAll();

        return $this->render('blog/index.html.twig', [
            'articles' => $articles,
        ]);
    }

    /**
     * @Route("/", name="home")
     */
    public function home(): Response
    {
        return $this->render('blog/home.html.twig', [
            'title' => 'Bienvenue sur mon blog',
        ]);
    }

    /**
     * @Route("/blog/article/{id}", name="blog_show",  requirements ={"id":"\d+"})
     */
    public function show(Article $article)


    {
        return $this->render('blog/show.html.twig', [
            'article' => $article,
        ]);
    }
}
