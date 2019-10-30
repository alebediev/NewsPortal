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

interface ArticlePresentationInterface
{
    public function getLatest(): ArticleCollection;
}
