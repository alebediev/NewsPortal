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
