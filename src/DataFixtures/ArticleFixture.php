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

use App\Entity\Article;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

final class ArticleFixture extends AbstractFixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 15; ++$i) {
            $title = \ucfirst($this->faker->words($this->faker->numberBetween(3, 5), true));
            $article = new Article($title);

            $category = $this->getReference($this->faker->randomElement(\array_keys(CategoryFixture::CATEGORIES)));
            $description = \ucfirst($this->faker->words($this->faker->numberBetween(4, 8), true));
            $article
                ->setCategory($category)
                ->setDescription($description)
                ->setImage($this->faker->imageUrl())
            ;

            $body = '';
            $sentences = $this->faker->numberBetween(8, 20);

            for ($j = 0; $j < $sentences; ++$j) {
                $body .= '<p>'
                    . $this->faker->words($this->faker->numberBetween(4, 8), true)
                    . '</p>'
                ;
            }

            $article->setBody($body);

            if ($this->faker->boolean(80)) {
                $article->publish();
            }

            $manager->persist($article);
        }

        $manager->flush();
    }

    /**
     * {@inheritdoc}
     */
    public function getDependencies()
    {
        return [CategoryFixture::class];
    }
}
