<?php

namespace DesignPatterns\Creational\AbstractFactory\Plain;

use DesignPatterns\Creational\AbstractFactory\ButtonInterface;

/**
 * Concrete plain HTML button that is created by @see PlainHTMLFactory::createButton()
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class PlainButton implements ButtonInterface
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
