<?php

namespace DesignPatterns\Creational\Builder\MySQL;

/**
 * MySQL query that is constructed by @see MySQLQueryBuilder.
 *
 * It corresponds to `Product` in the Builder pattern.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class MySQLQuery
{
    /**
     * Source table to select data from.
     *
     * @var string
     */
    private $table;

    /**
     * Where clauses.
     *
     * Where clauses.
     *
     * @var string[]
     */
    private $where = [];

    /**
     * Order by clauses.
     *
     * @var string[].
     */
    private $orderBy = [];

    /**
     * Maximum lines to return.
     *
     * @var integer
     */
    private $limit;

    /**
     * Constructor.
     *
     * @param string $table
     */
    public function __construct($table)
    {
        $this->table = $table;
    }

    /**
     * Add where clause to query.
     *
     * @param $where
     *
     * @return $this
     */
    public function addWhereClause($where)
    {
        $this->where[] = $where;

        return $this;
    }

    /**
     * Add order by clause to query.
     *
     * @param $orderBy
     *
     * @return $this
     */
    public function addOrderByClause($orderBy)
    {
        $this->orderBy[] = $orderBy;

        return $this;
    }

    /**
     * Set limit.
     *
     * @param int $limit
     *
     * @return $this
     */
    public function setLimit($limit)
    {
        $this->limit = $limit;

        return $this;
    }

    /**
     * Get SQL query:
     * `SELECT * FROM <table> WHERE <where clause> ORDER BY <sorting clause> LIMIT <max_results>`
     *
     * @return string
     */
    public function getSQL()
    {
        $query = 'SELECT * FROM ' . $this->table;

        if (!empty($this->where)) {
            $query .= ' WHERE ' . join(' AND ', $this->where);
        }

        if (!empty($this->orderBy)) {
            $query .= ' ORDER BY ' . join(', ', $this->orderBy);
        }

        if ($this->limit) {
            $query .= ' LIMIT ' . $this->limit;
        }

        return $query . ';';
    }
}
