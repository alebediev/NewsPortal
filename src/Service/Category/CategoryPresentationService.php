<?php

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