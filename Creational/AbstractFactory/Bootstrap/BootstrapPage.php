<?php

namespace DesignPatterns\Creational\AbstractFactory\Bootstrap;

use DesignPatterns\Creational\AbstractFactory\Element;
use DesignPatterns\Creational\AbstractFactory\Page;


class BootstrapPage implements Page
{
    private $elements = array();

    public function render()
    {
        echo '<!doctype html>
        <html lang="en">
            <head>
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
            </head>
            <body class="container">';

            foreach ($this->elements as $e) {
                $e->render();
            }

            echo '</body>
        </html>';
    }

    public function addElement(Element $element)
    {
        $this->elements[] = $element;
    }
}