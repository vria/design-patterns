<?php

namespace DesignPatterns\Structural\Adapter\Adapter;

use DesignPatterns\Structural\Adapter\BinaryTree\BinaryTreeNode;
use DesignPatterns\Structural\Adapter\Node;

/**
 * Adapts @BinaryTreeNode to enable it to be rendered by tree renderer.
 * An example of object adapter.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class BinaryTreeAdapter implements Node
{
    /**
     * Reference to adaptee.
     *
     * @var BinaryTreeNode
     */
    private $tree;

    /**
     * @param BinaryTreeNode $tree
     */
    public function __construct(BinaryTreeNode $tree)
    {
        $this->tree = $tree;
    }

    /**
     * @inheritdoc
     */
    public function label()
    {
        return $this->tree->getValue();
    }

    /**
     * @inheritdoc
     */
    public function children()
    {
        // Simply collect all existing children.
        $children = [];

        if ($left = $this->tree->getLeft()) {
            $children[] = new BinaryTreeAdapter($left);
        }

        if ($right = $this->tree->getRight()) {
            $children[] = new BinaryTreeAdapter($right);
        }

        return $children;
    }
}
