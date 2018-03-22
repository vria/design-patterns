<?php

namespace DesignPatterns\Creational\Builder\MongoDB;

use DesignPatterns\Creational\Builder\QueryBuilder;

/**
 * Builder that allows creating queries to MongoDB database.
 * It keeps track of the current representation of query under build and assembles it on demand.
 *
 * It corresponds to `ConcreteBuilder` in the Builder pattern.
 *
 * @author Vlad Riabchenko <vriabchenko@webnet.fr>
 */
class MongoDBBQueryBuilder extends QueryBuilder
{
    /**
     * @var MongoDBQuery
     */
    private $query;

    /**
     * @inheritdoc
     */
    public function createQuery($collection)
    {
        $this->query = new MongoDBQuery($collection);

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function andWhere($field, $operator, $value)
    {
        switch ($operator) {
            case QueryBuilder::EQUALS:
                $condition = '"' . $value . '"';
                break;
            case QueryBuilder::IN:
                // Represent 'in' operator as following condition: {$in: ['value_1', 'value_2', ...]}
                $condition = '{$in: ['
                    . array_reduce(
                        $value,
                        function($carry, $entry) {
                            return $carry . (empty($carry) ? '' : ',') . '"' . $entry . '"';
                        },
                        ''
                    )
                    . '])';
                ;
                break;
            case QueryBuilder::GREATER:
                $condition = '{$gt: ' . '"' . $value . '"}';
                break;
            case QueryBuilder::LOWER:
                $condition = '{$lt: ' . '"' . $value . '"}';
                break;
            default:
                throw new \InvalidArgumentException;
        }

        // Add where clause to the query under building
        $this->query->addFindClause($field . ': ' . $condition);

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function addOrderBy($field, $direction)
    {
        switch ($direction) {
            case QueryBuilder::ASC:
                $queryDirection = '1';
                break;
            case QueryBuilder::DESC:
                $queryDirection = '-1';
                break;
            default:
                throw new \InvalidArgumentException;
        }

        $this->query->addSortClause($field . ': ' . $queryDirection);

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
