<?php

namespace DesignPatterns\Creational\Prototype\Bootstrap;

use DesignPatterns\Creational\Prototype\AbstractPage;

/**
 * Concrete Bootstrap HTML page.
 * The `Renderer` (`Client`) doesn't depends on it.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class BootstrapPage extends AbstractPage
{
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
}
