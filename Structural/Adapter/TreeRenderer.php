<?php

namespace DesignPatterns\Structural\Adapter;

/**
 * Client class that outputs a tree structure of any @see Node object.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class TreeRenderer
{
    /**
     * Outputs a string representation of the tree structure object.
     *
     * @param Node $tree
     * @param int $level
     *
     * @return string
     */
    public function render(Node $tree, $level = 0)
    {
        // Output a current node at a current level.
        $output = str_repeat('--', $level).$tree->label()."\n";

        // For every child of current node
        foreach ($tree->children() as $child) {
            // Output it at the next level with all its children.
            $output .= $this->render($child, $level + 1);
        }

        return $output;
    }
}
