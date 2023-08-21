<?php

namespace App\Controller;

use App\Entity\Articles;
use App\Repository\ArticlesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleHoverController extends AbstractController
{
    #[Route('/article/hover', name: 'app_article_hover')]
    public function index(ArticlesRepository $articlesRepository): Response
    {
        $currentArticle = $this->getArticle($articlesRepository);

        return $this->render('article_hover/index.html.twig', [
            'controller_name' => 'ArticleHoverController',
            'articles' => $currentArticle
        ]);
    }
    private function getArticle(ArticlesRepository $articlesRepository): ?Articles
    {
        // Logic to fetch and return the current article
        // For example, you might fetch it from the database using the ArticlesRepository
        // Replace this with your actual logic
        return $articlesRepository->findOneBy(['id' => $_GET['id']]);
    }
}