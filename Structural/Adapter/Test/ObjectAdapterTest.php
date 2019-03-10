<?php

namespace DesignPatterns\Structural\Adapter\Test;

use DesignPatterns\Structural\Adapter\Adapter\BinaryTreeAdapter;
use DesignPatterns\Structural\Adapter\BinaryTree\BinaryTreeNode;
use DesignPatterns\Structural\Adapter\TreeRenderer;

/**
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class ObjectAdapterTest extends \PHPUnit_Framework_TestCase
{
    public function testTreeRenderer()
    {
        $tree = new BinaryTreeNode(10);
        $tree->insert(14);
        $tree->insert(5);
        $tree->insert(3);
        $tree->insert(11);
        $tree->insert(9);
        $tree->insert(17);
        $tree->insert(23);

        $renderer = new TreeRenderer();
        $node = new BinaryTreeAdapter($tree);

        $rendered = $renderer->render($node);
        $expected = <<<EOL
10
--5
----3
----9
--14
----11
----17
------23

EOL;

        $this->assertEquals($expected, $rendered);
    }
}
