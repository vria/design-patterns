<?php

namespace DesignPatterns\Behavioral\Strategy;

/**
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class ProductCollection
{
    /**
     * @var array
     */
    private $products;

    /**
     * @var ProductFilterInterface
     */
    private $filter;

    /**
     * @param array $products
     */
    public function __construct(array $products)
    {
        $this->products = $products;
    }

    /**
     * @param ProductFilterInterface $filter
     */
    public function setFilter(ProductFilterInterface $filter)
    {
        $this->filter = $filter;
    }

    /**
     * @return array
     *
     * @throw \LogicException if filter is not set
     */
    public function filterElements()
    {
        if (!$this->filter instanceof ProductFilterInterface) {
            throw new \LogicException("Filter is not set");
        }

        $this->products = $this->filter->filter($this->products);

        return $this->products;
    }
}
