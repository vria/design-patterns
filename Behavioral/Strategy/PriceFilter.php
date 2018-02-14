<?php

namespace DesignPatterns\Behavioral\Strategy;

/**
 * Concrete strategy to filter products by the price.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class PriceFilter implements ProductFilterInterface
{
    const SUPERIOR = "SUPERIOR";
    const INFERIOR = "INFERIOR";

    /**
     * The threshold to compare to
     *
     * @var double
     */
    private $threshold;

    /**
     * Whether to filter above or below the threshold
     *
     * @see PriceFilter::SUPERIOR
     * @see PriceFilter::INFERIOR
     *
     * @var string
     */
    private $compareWay;

    /**
     * Constructor
     *
     * @param double $threshold
     * @param string $compareWay
     */
    public function __construct($threshold, $compareWay = self::INFERIOR)
    {
        $this->threshold = $threshold;
        $this->compareWay = $compareWay;
    }

    /**
     * @param array $products
     *
     * @return array
     */
    public function filter(array $products)
    {
        $threshold = $this->threshold;
        $compareWay = $this->compareWay;

        return array_filter($products, function($product) use ($threshold, $compareWay) {
            return $compareWay == PriceFilter::SUPERIOR
                ? $product['price'] > $threshold
                : $product['price'] < $threshold;
        });
    }
}
