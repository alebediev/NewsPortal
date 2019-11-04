<?php

namespace App\Service\Category;


use App\Collection\ArticleCollection;

interface CategoryPresentationInterface
{
    public function getArticlesInCategory(string $slug): ArticleCollection;
}