<?php

namespace DesignPatterns\Structural\Adapter\Adapter;

use DesignPatterns\Structural\Adapter\Filesystem\FilesystemElement;
use DesignPatterns\Structural\Adapter\Node;

/**
 * Adapts @FilesystemElement to enable it to be rendered by tree renderer.
 * An example of class adapter that extends its adaptee.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class FilesystemAdapter extends FilesystemElement implements Node
{
    /**
     * @inheritdoc
     */
    public function label()
    {
        return $this->getBasename();
    }

    /**
     * @inheritdoc
     */
    public function children()
    {
        $children = $this->getSubElements();

        // Return all children in the form of FilesystemAdapter objects.
        return array_map(function($path) {
            return new FilesystemAdapter($path);
        }, $children);
    }
}
