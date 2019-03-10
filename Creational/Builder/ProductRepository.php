<?php

namespace DesignPatterns\Creational\Builder;

/**
 * Repository that is responsible for retrieving product's data from database.
 * It contains high level methods of such retrieval.
 * An instance of concrete builder is used to implement these methods.
 *
 * It corresponds to `Director` in the Builder pattern.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class ProductRepository
{
    /**
     * Query builder.
     *
     * @var QueryBuilder
     */
    private $qb;

    /**
     * Constructeur
     *
     * @param QueryBuilder $qb
     */
    public function __construct(QueryBuilder $qb)
    {
        $this->qb = $qb;
    }

    /**
     * Find all products ordered by ascending price.
     *
     * @return mixed
     */
    public function findAll()
    {
        return $this->qb
            ->createQuery('product')
            ->addOrderBy('price', QueryBuilder::ASC)
            ->getQuery();
    }

    /**
     * Find products for carousel. It returns 3 products maximum that :
     * - marked for a carousel,
     * - cost at least 50,
     * - ordered by descending creation date.
     *
     * @return mixed
     */
    public function findForCarousel()
    {
        return $this->qb
            ->createQuery('product')
            ->andWhere('carousel', QueryBuilder::EQUALS, true)
            ->andWhere('rating', QueryBuilder::GREATER, 50)
            ->addOrderBy('created_at', QueryBuilder::DESC)
            ->setMaxResults(3)
            ->getQuery();
    }

    /**
     * Find products for homepage. It returns 50 products that:
     * - either in stock or in pre-order state,
     * - cost greater then 100.99,
     * - ordered by descending update date.
     *
     * @return mixed
     */
    public function findForHomepage()
    {
        return $this->qb
            ->createQuery('product')
            ->andWhere('status', QueryBuilder::IN, ['in_stock', 'pre_order'])
            ->andWhere('price', QueryBuilder::GREATER, '100.99')
            ->addOrderBy('updated_at', QueryBuilder::DESC)
            ->setMaxResults(50)
            ->getQuery();
    }
}
