<?php

namespace DesignPatterns\Creational\AbstractFactory\Bootstrap;

use DesignPatterns\Creational\AbstractFactory\ElementInferface;
use DesignPatterns\Creational\AbstractFactory\PageInterface;

/**
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class BootstrapPage implements PageInterface
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
        echo <<<EOT
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </head>
    <body class="container">
EOT;

        foreach ($this->elements as $e) {
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
