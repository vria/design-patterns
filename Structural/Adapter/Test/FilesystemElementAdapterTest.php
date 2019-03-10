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
        $expected = <<<EOL
filesystem_adapter_fixtures
--1_one
----1_duo
------1_trois.txt
------2_trois.txt
----2_duo
--2_one
--3_one.txt

EOL;

        $this->assertEquals($expected, $rendered);
    }
}
