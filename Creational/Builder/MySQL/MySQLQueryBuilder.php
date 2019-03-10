<?php

namespace DesignPatterns\Creational\Builder\MySQL;

use DesignPatterns\Creational\Builder\QueryBuilder;

/**
 * Builder that allows creating queries to MySQL database.
 * It keeps track of the current representation of query under build and assembles it on demand.
 *
 * It corresponds to `ConcreteBuilder` in the Builder pattern.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class MySQLQueryBuilder extends QueryBuilder
{
    /**
     * @var MySQLQuery
     */
    private $query;

    /**
     * @inheritdoc
     */
    public function createQuery($from)
    {
        $this->query = new MySQLQuery($from);

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function andWhere($field, $operator, $value)
    {
        switch ($operator) {
            case QueryBuilder::EQUALS:
                $sqlOperator = '=';
                $value = '"' . $value . '"';
                break;
            case QueryBuilder::IN:
                $sqlOperator = 'IN';

                // represent array value as following string: ("value_1", "value_2", ...)
                $value = '('
                    . array_reduce(
                        $value,
                        function($carry, $entry) {
                            return $carry . (empty($carry) ? '' : ',') . '"' . $entry . '"';
                        },
                        ''
                    )
                    . ')';
                break;
            case QueryBuilder::GREATER:
                $sqlOperator = '>';
                $value = '"' . $value . '"';
                break;
            case QueryBuilder::LOWER:
                $sqlOperator = '<';
                $value = '"' . $value . '"';
                break;
            default:
                throw new \InvalidArgumentException;
        }

        // Add where clause to the query under building
        $this->query->addWhereClause($field . ' ' . $sqlOperator . ' ' . $value);

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function addOrderBy($field, $direction)
    {
        switch ($direction) {
            case QueryBuilder::ASC:
                $sqlDirection = 'ASC';
                break;
            case QueryBuilder::DESC:
                $sqlDirection = 'DESC';
                break;
            default:
                throw new \InvalidArgumentException;
        }

        // Add order by clause to the query under building
        $this->query->addOrderByClause($field . ' ' . $sqlDirection);

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function setMaxResults($maxResults)
    {
        $this->query->setLimit($maxResults);

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getQuery()
    {
        return $this->query;
    }
}
