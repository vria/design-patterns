<?php

namespace DesignPatterns\Creational\AbstractFactory\Plain;

use DesignPatterns\Creational\AbstractFactory\ElementInferface;
use DesignPatterns\Creational\AbstractFactory\PageInterface;

/**
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class PlainPage implements PageInterface
{
    /**
     * @var ElementInferface[]
     */
    private $elements = [];

    /**
     * @inheritdoc
     */
    public function render()
    {
        echo '<!doctype html><html lang="en"><body>';

        foreach ($this->elements as $e) {
            /* @var $e ElementInferface */
            $e->render();
        }

        echo '</body></html>';
    }

    /**
     * @param ElementInferface $element
     *
     * @return $this
     */
    public function addElement(ElementInferface $element)
    {
        $this->elements[] = $element;

        return $this;
    }
}
