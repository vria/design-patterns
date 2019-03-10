<?php

namespace DesignPatterns\Structural\Adapter;

/**
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class TreeRenderer
{
    /**
     * @param Node $tree
     * @param int $level
     *
     * @return string
     */
    public function render(Node $tree, $level = 0)
    {
        $output = str_repeat('--', $level).$tree->label()."\n";

        foreach ($tree->children() as $child) {
            $output .= $this->render($child, $level + 1);
        }

        return $output;
    }
}
