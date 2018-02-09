<?php

namespace DesignPatterns\Behavioral\Command;

/**
 * Immutable 2D point
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class Point
{
    /**
     * @var int
     */
    public $x;

    /**
     * @var int
     */
    public $y;

    /**
     * Constructor
     *
     * @param int $x
     * @param int $y
     */
    public function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    /**
     * @param Point $p
     * @return bool
     */
    public function equalTo(Point $p)
    {
        return $this->x == $p->x && $this->y == $p->y;
    }
}
