<?php

namespace DesignPatterns\Behavioral\ChainOfResponsibility;

/**
 * Request to pass to handler chain.
 * Parcel is to be delivered by one of the concrete transports:
 * @see AirMail
 * @see RailwayMail
 * @see TruckMail
 *
 * @author Vlad Riabchenko <vriabchenko@webnet.fr>
 */
class Parcel
{
    /**
     * @var float
     */
    private $weight;

    /**
     * @var int
     */
    private $distance;

    /**
     * @param float $weight
     * @param int $distance
     */
    public function __construct($weight, $distance)
    {
        $this->weight = $weight;
        $this->distance = $distance;
    }

    /**
     * Get weight.
     *
     * @return float
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Get distance.
     *
     * @return int
     */
    public function getDistance()
    {
        return $this->distance;
    }
}
