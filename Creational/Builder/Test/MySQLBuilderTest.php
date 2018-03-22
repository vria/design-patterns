<?php

namespace DesignPatterns\Creational\Builder\Test;
use DesignPatterns\Creational\Builder\MySQL\MySQLQueryBuilder;
use DesignPatterns\Creational\Builder\MySQL\MySQLQuery;
use DesignPatterns\Creational\Builder\ProductRepository;
use DesignPatterns\Creational\Builder\QueryBuilder;

/**
 * @author Vlad Riabchenko <vriabchenko@webnet.fr>
 */
class MySQLBuilderTest extends \PHPUnit_Framework_TestCase
{
    use BuilderTestTrait;

    /**
     * @var QueryBuilder
     */
    protected $qb;

    /**
     * @var ProductRepository
     */
    protected $repo;

    public function setUp()
    {
        $this->qb = new MySQLQueryBuilder();
        $this->repo = new ProductRepository(new MySQLQueryBuilder());
    }

    public function testFindAll()
    {
        $expected = 'SELECT * FROM product ORDER BY price ASC;';

        /** @var $query MySQLQuery */

        // Query created without repository
        $query = $this->createFindAllQuery($this->qb);
        $this->assertInstanceOf(MySQLQuery::class, $query);
        $this->assertEquals($expected, $query->getSQL());

        // Query created by means of product repository
        $query = $this->repo->findAll();
        $this->assertInstanceOf(MySQLQuery::class, $query);
        $this->assertEquals($expected, $query->getSQL());
    }

    public function testFindForCarousel()
    {
        $expected = 'SELECT * FROM product WHERE carousel = "1" AND rating > "50" ORDER BY created_at DESC LIMIT 3;';

        // Query created without repository
        $query = $this->createFindForCarousel($this->qb);
        $this->assertInstanceOf(MySQLQuery::class, $query);
        $this->assertEquals($expected, $query->getSQL());

        // Query created by means of product repository
        $query = $this->repo->findForCarousel();
        $this->assertInstanceOf(MySQLQuery::class, $query);
        $this->assertEquals($expected, $query->getSQL());
    }

    public function testFindForHomepage()
    {
        $expected = 'SELECT * FROM product WHERE status IN ("in_stock","pre_order") AND price > "100.99" ORDER BY updated_at DESC LIMIT 50;';

        // Query created without repository
        $query = $this->createFindForHomepage($this->qb);
        $this->assertInstanceOf(MySQLQuery::class, $query);
        $this->assertEquals($expected, $query->getSQL());

        // Query created by means of product repository
        $query = $this->repo->findForHomepage();
        $this->assertInstanceOf(MySQLQuery::class, $query);
        $this->assertEquals($expected, $query->getSQL());
    }
}
