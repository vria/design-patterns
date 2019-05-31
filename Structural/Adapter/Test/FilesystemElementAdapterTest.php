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

        $expected = "filesystem_adapter_fixtures\n"
                    ."--1_one\n"
                    ."----1_duo\n"
                    ."------1_trois.txt\n"
                    ."------2_trois.txt\n"
                    ."----2_duo\n"
                    ."--2_one\n"
                    ."--3_one.txt\n";

        $this->assertEquals($expected, $rendered);
    }
}
