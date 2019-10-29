<?php

namespace App\Controller;

use App\Service\Article\ArticlePresentationInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

final class DefaultController extends AbstractController
{
    public function index(ArticlePresentationInterface $articlePresentation): Response
    {
        $articles = $articlePresentation->getLatest();
        return $this->render('default/index.html.twig', [
            'articles' => $articles,
        ]);
    }
}