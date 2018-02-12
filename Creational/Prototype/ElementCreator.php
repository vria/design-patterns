<?php

namespace DesignPatterns\Creational\Prototype;

/**
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class ElementCreator
{
    /**
     * @var ElementInterface
     */
    private $prototype;

    /**
     * Constructeur
     *
     * @param ElementInterface $prototype
     */
    public function __construct(ElementInterface $prototype)
    {
        $this->prototype = $prototype;
    }

    /**
     * @return ElementInterface
     */
    public function create()
    {
        return clone $this->prototype;
    }
}
