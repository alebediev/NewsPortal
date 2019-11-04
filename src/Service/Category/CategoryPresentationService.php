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

namespace App\Service\Category;

use App\Collection\ArticleCollection;
use App\Repository\Category\ArticlesInCategoryInterface;

final class CategoryPresentationService implements CategoryPresentationInterface
{
    private $categoryRepository;

    public function __construct(ArticlesInCategoryInterface $articlesInCategory)
    {
        $this->categoryRepository = $articlesInCategory;
    }

    public function getArticlesInCategory(string $slug): ArticleCollection
    {
        $articles = $this->categoryRepository->findAllArticlesInCategory($slug);

        return new ArticleCollection(...$articles);
    }
}
