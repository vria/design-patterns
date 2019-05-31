<?php

namespace DesignPatterns\Structural\Adapter\Test;

use DesignPatterns\Structural\Adapter\Adapter\FilesystemAdapter;
use DesignPatterns\Structural\Adapter\TreeRenderer;

/**
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class FilesystemElementAdapterTest extends \PHPUnit_Framework_TestCase
{
    public function testTreeRenderer()
    {
        $renderer = new TreeRenderer();
        $node = new FilesystemAdapter(__DIR__.'/filesystem_adapter_fixtures');
        $rendered = $renderer->render($node);

        $expected = "test string";

        $this->assertEquals($expected, $rendered);
    }
}
