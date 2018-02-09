<?php

namespace DesignPatterns\Creational\AbstractFactory\Plain;

use DesignPatterns\Creational\AbstractFactory\Element;
use DesignPatterns\Creational\AbstractFactory\Page;

/**
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class PlainPage implements Page
{
    /**
     * @var Element[]
     */
    private $elements = [];

    /**
     * @inheritdoc
     */
    public function render()
    {
        echo '<!doctype html><html lang="en"><body>';

        foreach ($this->elements as $e) {
            /* @var $e Element */
            $e->render();
        }

        echo '</body></html>';
    }

    /**
     * @param Element $element
     *
     * @return $this
     */
    public function addElement(Element $element)
    {
        $this->elements[] = $element;

        return $this;
    }
}
