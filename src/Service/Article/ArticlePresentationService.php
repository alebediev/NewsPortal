<?php

namespace App\Service\Article;

use App\Collection\ArticleCollection;
use App\Repository\Article\ArticleRepositoryInterface;

final class ArticlePresentationService implements ArticlePresentationInterface
{
    private $articleRepository;

    public function __construct(ArticleRepositoryInterface $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    /**
     * {@inheritdoc}
     */
    public function getLatest(): ArticleCollection
    {
        $articles = $this->articleRepository->findLatest();

        return new ArticleCollection(...$articles);
    }
}