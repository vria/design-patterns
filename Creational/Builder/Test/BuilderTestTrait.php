<?php

namespace DesignPatterns\Creational\Builder\Test;

use DesignPatterns\Creational\Builder\ProductRepository;
use DesignPatterns\Creational\Builder\QueryBuilder;

/**
 * @author Vlad Riabchenko <vriabchenko@webnet.fr>
 */
trait BuilderTestTrait
{
    /**
     * @see ProductRepository::findAll()
     *
     * @param QueryBuilder $qb
     * @return mixed
     */
    protected function createFindAllQuery(QueryBuilder $qb)
    {
        return $qb
            ->createQuery('product')
            ->addOrderBy('price', QueryBuilder::ASC)
            ->getQuery();
    }

    /**
     * @see ProductRepository::findForCarousel()
     *
     * @param QueryBuilder $qb
     * @return mixed
     */
    protected function createFindForCarousel(QueryBuilder $qb)
    {
        return $qb
            ->createQuery('product')
            ->andWhere('carousel', QueryBuilder::EQUALS, true)
            ->andWhere('rating', QueryBuilder::GREATER, 50)
            ->addOrderBy('created_at', QueryBuilder::DESC)
            ->setMaxResults(3)
            ->getQuery();
    }

    /**
     * @see ProductRepository::findForHomepage()
     *
     * @param QueryBuilder $qb
     *
     * @return mixed
     */
    protected function createFindForHomepage(QueryBuilder $qb)
    {
        return $qb
            ->createQuery('product')
            ->andWhere('status', QueryBuilder::IN, ['in_stock', 'pre_order'])
            ->andWhere('price', QueryBuilder::GREATER, '100.99')
            ->addOrderBy('updated_at', QueryBuilder::DESC)
            ->setMaxResults(50)
            ->getQuery();
    }
}
