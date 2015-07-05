<?php

namespace DesignPatterns\Behavioral\Strategy;


class ProductCollection
{
    private $products;

    private $filter;

    public function __construct($products)
    {
        $this->products = $products;
    }

    public function setFilter(ProductFilter $filter)
    {
        $this->filter = $filter;
    }

    public function filterElements()
    {
        if (!$this->filter) {
            throw new \LogicException("Filter is not set");
        }

        $this->products = $this->filter->filter($this->products);

        return $this->products;
    }
}