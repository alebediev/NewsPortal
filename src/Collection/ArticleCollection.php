<?php

namespace App\Collection;

use App\Model\Article;

final class ArticleCollection implements \IteratorAggregate
{
    /** @var Article[] */
    private $articles;
    public function __construct(Article ...$articles)
    {
        $this->articles = $articles;
    }
    public function shift(): Article
    {
        $article = \array_shift($this->articles);
        if (null === $article) {
            throw new \RuntimeException('Articles collection is empty');
        }
        return $article;
    }
    public function slice(int $number): iterable
    {
        for ($i = 0; $i < $number; $i++) {
            yield $this->shift();
        }
    }
    public function getIterator(): iterable
    {
        return new \ArrayIterator($this->articles);
    }
}