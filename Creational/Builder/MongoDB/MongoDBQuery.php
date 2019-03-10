<?php

namespace DesignPatterns\Creational\Builder\MongoDB;

/**
 * MongoBB query that is constructed by @see MongoDBBQueryBuilder.
 *
 * It corresponds to `Product` in the Builder pattern.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class MongoDBQuery
{
    /**
     * A source collection to select data from.
     *
     * @var string
     */
    private $collection;

    /**
     * Where conditions[].
     *
     * @var string[]
     */
    private $find = [];

    /**
     * @var string[].
     */
    private $sort = [];

    /**
     * @var string
     */
    private $limit;

    /**
     * Constructor.
     *
     * @param string $collection
     */
    public function __construct($collection)
    {
        $this->collection = $collection;
    }

    /**
     * Add find clause to query.
     *
     * @param $find
     *
     * @return $this
     */
    public function addFindClause($find)
    {
        $this->find[] = $find;

        return $this;
    }

    /**
     * Add sort clause to query.
     *
     * @param $sort
     *
     * @return $this
     */
    public function addSortClause($sort)
    {
        $this->sort[] = $sort;

        return $this;
    }

    /**
     * Set limit to query.
     *
     * @param string $limit
     *
     * @return $this
     */
    public function setLimit($limit)
    {
        $this->limit = $limit;

        return $this;
    }

    /**
     * Get a string representation of MongoDB query command:
     * `db.<collection>.find(<find clause>).sort(<sort clause>).limit(<max_results>)`
     *
     * @return string
     */
    public function getCommand()
    {
        $query = 'db.' . $this->collection;

        $query .= '.find({' . join(', ', $this->find) . '})';

        if (!empty($this->sort)) {
            $query .= '.sort({' . join(', ', $this->sort) . '})';
        }

        if ($this->limit) {
            $query .= '.limit(' . $this->limit . ')';
        }

        return $query;
    }
}
