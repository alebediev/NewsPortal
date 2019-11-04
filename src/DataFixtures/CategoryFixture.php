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

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Common\Persistence\ObjectManager;

final class CategoryFixture extends AbstractFixture
{
    public const CATEGORIES = [
        'world' => 'World',
        'sport' => 'Sport',
        'it' => 'IT',
        'science' => 'Science',
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::CATEGORIES as $slug => $title) {
            $category = new Category($title);

            $manager->persist($category);

            $this->addReference($slug, $category);
        }

        $manager->flush();
    }
}
