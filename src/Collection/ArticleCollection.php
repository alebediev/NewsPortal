<?php

declare(strict_types=1);

/*
 * This file is part of the "PHP Static Analyzer" project.
 *
 * (c) Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

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
        for ($i = 0; $i < $number; ++$i) {
            yield $this->shift();
        }
    }

    public function getIterator(): iterable
    {
        return new \ArrayIterator($this->articles);
    }
}
