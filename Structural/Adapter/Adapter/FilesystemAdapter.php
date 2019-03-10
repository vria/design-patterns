<?php

namespace DesignPatterns\Structural\Adapter\Adapter;

use DesignPatterns\Structural\Adapter\Filesystem\FilesystemElement;
use DesignPatterns\Structural\Adapter\Node;

/**
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

        return array_map(function($path) {
            return new FilesystemAdapter($path);
        }, $children);
    }
}
