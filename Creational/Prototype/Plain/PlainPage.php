<?php

namespace DesignPatterns\Creational\Prototype\Plain;

use DesignPatterns\Creational\Prototype\AbstractPage;

/**
 * Concrete plain HTML page that is created by @see PlainHTMLFactory::createPage()
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class PlainPage extends AbstractPage
{
    /**
     * @inheritdoc
     */
    public function render()
    {
        echo '<!doctype html><html lang="en"><body>';

        foreach ($this->elements as $e) {
            $e->render();
        }

        echo '</body></html>';
    }
}
