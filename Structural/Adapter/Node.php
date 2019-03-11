<?php

namespace DesignPatterns\Structural\Adapter;

/**
 * It is a Target interface to be output by @see TreeRenderer.
 * Any object that implements this interface can be rendered by @see TreeRenderer.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
interface Node
{
    /**
     * Get label of this node.
     *
     * @return string
     */
    public function label();

    /**
     * Get all children.
     *
     * @return Node[]
     */
    public function children();
}
