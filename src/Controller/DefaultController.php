<?php

declare(strict_types=1);

/*
 * This file is part of the "News portal" project.
 *
 * (c) Andrii Lebediev <wasaby.stnc@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Controller;

use App\Service\Article\ArticlePageInterface;
use App\Service\Article\ArticlePresentationInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

final class DefaultController extends AbstractController
{
    /**
     * Home page view action.
     *
     * @param ArticlePresentationInterface $articlePresentation
     *
     * @return Response
     */
    public function index(ArticlePresentationInterface $articlePresentation): Response
    {
        $articles = $articlePresentation->getLatest();

        return $this->render('default/index.html.twig', [
            'articles' => $articles,
        ]);
    }

    /**
     * Article view action.
     *
     * @param int                  $id
     * @param ArticlePageInterface $articlePage
     *
     * @return Response
     */
    public function article(int $id, ArticlePageInterface $articlePage): Response
    {
        $article = $articlePage->getArticle($id);

        return $this->render('default/article.html.twig', [
            'article' => $article,
        ]);
    }
}
