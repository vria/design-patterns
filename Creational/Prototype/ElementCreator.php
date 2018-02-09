<?php

namespace DesignPatterns\Creational\Prototype;

/**
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class ElementCreator
{
    /**
     * @var Element
     */
    private $prototype;

    /**
     * Constructeur
     *
     * @param Element $prototype
     */
    public function __construct(Element $prototype)
    {
        $this->prototype = $prototype;
    }

    /**
     * @return Element
     */
    public function create()
    {
        return clone $this->prototype;
    }
}
