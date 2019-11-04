<?php

namespace App\Repository\Category;

interface ArticlesInCategoryInterface
{
    /**
     * @param string $slug
     *
     * @return \App\Entity\Article[]
     */
    public function findAllArticlesInCategory(string $slug): iterable;
}