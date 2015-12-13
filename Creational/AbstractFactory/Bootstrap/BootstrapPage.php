<?php

namespace DesignPatterns\Creational\AbstractFactory\Bootstrap;

use DesignPatterns\Creational\AbstractFactory\Element;
use DesignPatterns\Creational\AbstractFactory\Page;

/**
 * Class BootstrapPage
 * @package DesignPatterns\Creational\AbstractFactory\Bootstrap
 */
class BootstrapPage implements Page
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
        $this->startBody();
        foreach ($this->elements as $e) {
            /* @var $e Element */
            $e->render();
        }
        $this->endBody();
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

    private function startBody()
    {
        echo
<<<EOT
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </head>
    <body class="container">
EOT;
    }

    private function endBody()
    {
        echo '</body></html>';
    }
}
