<?php

namespace DesignPatterns\Behavioral\Strategy;

/**
 * The context that holds an array of products.
 * The products can by filtered by various filtering strategies.
 * The code of these strategies is encapsulated in the implementator of @see ProductFilterInterface that is also stored in this class.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class ProductCollection
{
    /**
     * Products that can be filtered
     *
     * @var array
     */
    private $products;

    /**
     * Current filtering strategy
     *
     * @var ProductFilterInterface
     */
    private $filter;

    /**
     * Constructor
     *
     * @param array $products
     */
    public function __construct(array $products)
    {
        $this->products = $products;
    }

    /**
     * Set filtering strategy
     *
     * @param ProductFilterInterface $filter
     */
    public function setFilter(ProductFilterInterface $filter)
    {
        $this->filter = $filter;
    }

    /**
     * Get filtered elements
     *
     * @return array
     *
     * @throw \LogicException if filter is not set
     */
    public function filterElements()
    {
        if (!$this->filter) {
            // If the strategy was not set in advance return the initial collection of products as is (without filtering)
            // Another approach would be to throw an exception
            return $this->products;
        }

        return $this->filter->filter($this->products);
    }
}
