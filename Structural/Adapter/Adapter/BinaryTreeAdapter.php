<?php

namespace DesignPatterns\Structural\Adapter\Adapter;

use DesignPatterns\Structural\Adapter\BinaryTree\BinaryTreeNode;
use DesignPatterns\Structural\Adapter\Node;

/**
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class BinaryTreeAdapter implements Node
{
    /**
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
     * @return int
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
