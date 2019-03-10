<?php

namespace DesignPatterns\Structural\Adapter;

/**
 * @author Vlad Riabchenko <contact@vria.eu>
 */
interface Node
{
    /**
     * Get label to be rendered.
     *
     * @return string
     */
    public function label();

    /**
     * Get children.
     *
     * @return Node[]
     */
    public function children();
}
