<?php

namespace App\Service\Article;
use App\Collection\ArticleCollection;

interface ArticlePresentationInterface
{
    public function getLatest(): ArticleCollection;
}