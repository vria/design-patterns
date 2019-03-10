<?php

namespace DesignPatterns\Creational\Builder\Test;
use DesignPatterns\Creational\Builder\MongoDB\MongoDBBQueryBuilder;
use DesignPatterns\Creational\Builder\MongoDB\MongoDBQuery;
use DesignPatterns\Creational\Builder\ProductRepository;
use DesignPatterns\Creational\Builder\QueryBuilder;

/**
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class MongoDBBuilderTest extends \PHPUnit_Framework_TestCase
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
        $this->qb = new MongoDBBQueryBuilder();
        $this->repo = new ProductRepository(new MongoDBBQueryBuilder());
    }

    public function testFindAll()
    {
        $expected = 'db.product.find({}).sort({price: 1})';

        /** @var $query MongoDBQuery */

        // Query created without repository
        $query = $this->createFindAllQuery($this->qb);
        $this->assertInstanceOf(MongoDBQuery::class, $query);
        $this->assertEquals($expected, $query->getCommand());

        // Query created by means of product repository
        $query = $this->repo->findAll();
        $this->assertInstanceOf(MongoDBQuery::class, $query);
        $this->assertEquals($expected, $query->getCommand());
    }

    public function testFindForCarousel()
    {
        $expected = 'db.product.find({carousel: "1", rating: {$gt: "50"}}).sort({created_at: -1}).limit(3)';

        /** @var $query MongoDBQuery */

        // Query created without repository
        $query = $this->createFindForCarousel($this->qb);
        $this->assertInstanceOf(MongoDBQuery::class, $query);
        $this->assertEquals($expected, $query->getCommand());

        // Query created by means of product repository
        $query = $this->repo->findForCarousel();
        $this->assertInstanceOf(MongoDBQuery::class, $query);
        $this->assertEquals($expected, $query->getCommand());
    }

    public function testFindForHomepage()
    {
        $expected = 'db.product.find({status: {$in: ["in_stock","pre_order"]), price: {$gt: "100.99"}}).sort({updated_at: -1}).limit(50)';

        /** @var $query MongoDBQuery */

        // Query created without repository
        $query = $this->createFindForHomepage($this->qb);
        $this->assertInstanceOf(MongoDBQuery::class, $query);
        $this->assertEquals($expected, $query->getCommand());

        // Query created by means of product repository
        $query = $this->repo->findForHomepage();
        $this->assertInstanceOf(MongoDBQuery::class, $query);
        $this->assertEquals($expected, $query->getCommand());
    }
}
