<?php

namespace DesignPatterns\Structural\Adapter\BinaryTree;

/**
 * A node of binary tree.
 * Can be a root, can be a leaf, can be an intermediate node.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class BinaryTreeNode
{
    /**
     * The value of this node.
     *
     * @var int
     */
    private $value;

    /**
     * Optional left child.
     * It's value is always lower than the value of this node.
     *
     * @var BinaryTreeNode
     */
    private $left;

    /**
     * Optional right child.
     * It's value is always higher or equal than the value of this node.
     *
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
     * Insert a value.
     * This method always creates a new node somewhere down the tree.
     *
     * @param int $value
     */
    public function insert($value)
    {
        if ($this->value <= $value) {
            // Insert in right subtree.
            if ($this->right) {
                // If right child already exists then pass the value to it.
                $this->right->insert($value);
            } else {
                // If not then create a new right child.
                $this->right = new BinaryTreeNode($value);
            }
        } elseif ($this->value > $value) {
            // Insert in left subtree.
            if ($this->left) {
                // If left child already exists then pass the value to it.
                $this->left->insert($value);
            } else {
                // If not then create a new left child.
                $this->left = new BinaryTreeNode($value);
            }
        }
    }

    /**
     * Get value.
     *
     * @return int
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Get left child node.
     *
     * @return BinaryTreeNode
     */
    public function getLeft()
    {
        return $this->left;
    }

    /**
     * Get right child node.
     *
     * @return BinaryTreeNode
     */
    public function getRight()
    {
        return $this->right;
    }
}
