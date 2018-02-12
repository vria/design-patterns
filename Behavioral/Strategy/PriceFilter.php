<?php

namespace DesignPatterns\Behavioral\Strategy;

/**
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class PriceFilter implements ProductFilterInterface
{
    const SUPERIOR = "SUPERIOR";
    const INFERIOR = "INFERIOR";

    /**
     * @var double
     */
    private $threshold;

    /**
     * @var string
     */
    private $compareWay;

    /**
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
