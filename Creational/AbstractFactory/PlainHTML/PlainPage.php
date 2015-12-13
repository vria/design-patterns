<?php

namespace DesignPatterns\Creational\AbstractFactory\PlainHTML;

use DesignPatterns\Creational\AbstractFactory\Element;
use DesignPatterns\Creational\AbstractFactory\Page;


/**
 * Class PlainPage
 * @package DesignPatterns\Creational\AbstractFactory\PlainHTML
 */
class PlainPage implements Page
{
    /**
     * @var array
     */
    private $elements = array();

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
     * @return $this
     */
    public function addElement(Element $element)
    {
        $this->elements[] = $element;

        return $this;
    }
}
