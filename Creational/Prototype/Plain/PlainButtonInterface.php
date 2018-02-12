<?php

namespace DesignPatterns\Creational\Prototype\Plain;

use DesignPatterns\Creational\Prototype\ElementInterface;

/**
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class PlainButton implements ElementInterface
{
    /**
     * @var string
     */
    private $label;

    /**
     * @param string $label
     */
    public function __construct($label)
    {
        $this->label = $label;
    }

    /**
     * @inheritdoc
     */
    public function render()
    {
        echo '<button>' . $this->label . '</button>';
    }
}
