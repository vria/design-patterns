<?php

namespace DesignPatterns\Creational\AbstractFactory\PlainHTML;

use DesignPatterns\Creational\AbstractFactory\Element;
use DesignPatterns\Creational\AbstractFactory\Page;


class PlainPage implements Page
{
    private $elements = array();

    public function render()
    {
        echo '<!doctype html><html lang="en"><body>';

        foreach ($this->elements as $e) {
            $e->render();
        }

        echo '</body></html>';
    }

    public function addElement(Element $element)
    {
        $this->elements[] = $element;

        return $this;
    }
}