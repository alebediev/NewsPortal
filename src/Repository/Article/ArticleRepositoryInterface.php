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

namespace App\Repository\Article;

interface ArticleRepositoryInterface
{
    /**
     * @return \App\Entity\Article[]
     */
    public function findLatest(): iterable;
}
