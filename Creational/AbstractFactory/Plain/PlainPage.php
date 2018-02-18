<?php

namespace DesignPatterns\Creational\AbstractFactory\Plain;

use DesignPatterns\Creational\AbstractFactory\ElementInterface;
use DesignPatterns\Creational\AbstractFactory\PageInterface;

/**
 * Concrete plain HTML page that is created by @see PlainHTMLFactory::createPage()
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class PlainPage implements PageInterface
{
    /**
     * @var ElementInterface[]
     */
    private $elements = [];

    /**
     * @inheritdoc
     */
    public function render()
    {
        echo '<!doctype html><html lang="en"><body>';

        foreach ($this->elements as $e) {
            /* @var $e ElementInterface */
            $e->render();
        }

        echo '</body></html>';
    }

    /**
     * @param ElementInterface $element
     *
     * @return $this
     */
    public function addElement(ElementInterface $element)
    {
        $this->elements[] = $element;

        return $this;
    }
}
