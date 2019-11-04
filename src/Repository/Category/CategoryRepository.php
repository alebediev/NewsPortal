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

namespace App\Repository\Category;

use App\Entity\Article;
use App\Entity\Category;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Category|null find($id, $lockMode = null, $lockVersion = null)
 * @method Category|null findOneBy(array $criteria, array $orderBy = null)
 * @method Category[]    findAll()
 * @method Category[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategoryRepository extends ServiceEntityRepository implements ArticlesInCategoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Category::class);
    }

    /**
     * Get all articles in some category.
     *
     * @param string $slug
     *
     * @return iterable
     */
    public function findAllArticlesInCategory(string $slug): iterable
    {
        $qb = $this->getEntityManager()->createQueryBuilder();

        $query = $qb->select('a')
            ->from(Article::class, 'a')
            ->join('a.category', 'c')
            ->where('c.slug = :slug')
            ->andWhere('a.publishedAt IS NOT NULL')
            ->orderBy('a.publishedAt', 'DESC')
            ->setParameter('slug', $slug)
            ->getQuery()
        ;

        return $query->getResult();
    }
}
