<?php

namespace DesignPatterns\Structural\Adapter\BinaryTree;

/**
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class BinaryTreeNode
{
    /**
     * @var int
     */
    private $value;

    /**
     * @var BinaryTreeNode
     */
    private $left;

    /**
     * @var BinaryTreeNode
     */
    private $right;

    /**
     * @param int $value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * @param int $value
     */
    public function insert($value)
    {
        if ($this->value < $value) {
            if ($this->right) {
                $this->right->insert($value);
            } else {
                $this->right = new BinaryTreeNode($value);
            }
        } elseif ($this->value > $value) {
            if ($this->left) {
                $this->left->insert($value);
            } else {
                $this->left = new BinaryTreeNode($value);
            }
        }

        // Do nothing if value already exist in tree.
    }

    /**
     * @return int
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return BinaryTreeNode
     */
    public function getLeft()
    {
        return $this->left;
    }

    /**
     * @return BinaryTreeNode
     */
    public function getRight()
    {
        return $this->right;
    }
}
