<?php

require '../../vendor/autoload.php';

use DesignPatterns\Behavioral\Strategy\ProductCollection;
use DesignPatterns\Behavioral\Strategy\InStockFilter;
use DesignPatterns\Behavioral\Strategy\PriceFilter;

echo "\n==== All products ====\n";
$products = new ProductCollection(array(
        array('name' => 'Grand Prime', 'price' => 184.90, 'in_stock' => true),
        array('name' => 'Core Prime', 'price' => 138.00, 'in_stock' => false),
        array('name' => 'Trend Lite', 'price' => 69.90, 'in_stock' => true))
    );
var_dump($products);

echo "\n==== Available products (In stock) ====\n";
$products->setFilter(new InStockFilter());
var_dump($products->filterElements());

echo "\n==== Cheap products (Cost less than 100) ====\n";
$products->setFilter(new PriceFilter(100));
var_dump($products->filterElements());