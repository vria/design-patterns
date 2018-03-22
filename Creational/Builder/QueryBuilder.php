<?php

namespace DesignPatterns\Creational\Builder;

/**
 * A common interface for building a query to database. Pay attention that builder allows for a fluent interface:
 * `$query = $qb->andWhere(...)->andWhere(...)->orderBy(...)->getQuery();`
 *
 * It corresponds to `Builder` in the Builder pattern.
 *
 * @author Vlad Riabchenko <vriabchenko@webnet.fr>
 */
abstract class QueryBuilder
{
    // Operators for where clause
    const EQUALS  = 'EQUALS';
    const IN      = 'IN';
    const GREATER = 'GREATER';
    const LOWER   = 'LOWER';

    // Order directions
    const ASC  = 'ASC';
    const DESC = 'DESC';

    /**
     * Start creating a new query.
     *
     * @param string $from The source to retrieve data from (table name in MySQL, collection name in MongoDB, etc.)
     *
     * @return $this
     */
    abstract public function createQuery($from);

    /**
     * Add where conditions.
     *
     * @param string            $field    Field to apply a filter for.
     * @param string            $operator Operator like `EQUALS`, `IN`, ...
     * @param string|array|bool $value
     *
     * @return $this
     */
    public function andWhere($field, $operator, $value)
    {
        // do nothing by default
        return $this;
    }

    /**
     * Add sorting.
     *
     * @param string $field
     * @param string $direction
     *
     * @return $this
     */
    public function addOrderBy($field, $direction)
    {
        // do nothing by default
        return $this;
    }

    /**
     * Set max results.
     *
     * @param integer $maxResults
     *
     * @return $this
     */
    public function setMaxResults($maxResults)
    {
        // do nothing by default
        return $this;
    }

    /**
     * Return a query to execute. In this example this is can be:
     * - @see \DesignPatterns\Creational\Builder\MongoDB\MongoDBQuery
     * - @see \DesignPatterns\Creational\Builder\MySQL\MySQLQuery
     *
     * @return mixed
     */
    abstract public function getQuery();
}
