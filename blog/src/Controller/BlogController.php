<?php

namespace App\Controller;

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
     * @Route("/blog/article/12", name="blog_show")
     */
    public function show(): Response
    {
        return $this->render('blog/show.html.twig');
    }
}
