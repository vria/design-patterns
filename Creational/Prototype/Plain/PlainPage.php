<?php

namespace DesignPatterns\Creational\Prototype\Plain;

use DesignPatterns\Creational\Prototype\AbstractPage;

/**
 * Concrete plain HTML page.
 * The `Renderer` (`Client`) doesn't depends on it.
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
