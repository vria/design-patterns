<?php

namespace DesignPatterns\Behavioral\Strategy;


class PriceFilter implements ProductFilter
{
    const SUPERIOR = 0x1;
    const INFERIOR = 0x2;

    private $threshold;
    private $compareWay;

    public function __construct($threshold, $compareWay = self::INFERIOR)
    {
        $this->threshold = $threshold;
        $this->compareWay = $compareWay;
    }

    public function filter($products)
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