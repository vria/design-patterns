<?php

namespace DesignPatterns\Creational\AbstractFactory\Test;

use DesignPatterns\Creational\AbstractFactory\PlainHTML\PlainButton;
use DesignPatterns\Creational\AbstractFactory\PlainHTML\PlainPage;
use DesignPatterns\Creational\AbstractFactory\PlainHTML\PlainPageFactory;
use DesignPatterns\Creational\AbstractFactory\PlainHTML\PlainTextInput;

class PlainPageFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var PlainPageFactory
     */
    protected static $factory;

    public static function setUpBeforeClass()
    {
        self::$factory = new PlainPageFactory();
    }

    public function testButton()
    {
        $button = self::$factory->createButton("Submit");

        $this->assertInstanceOf("DesignPatterns\\Creational\\AbstractFactory\\PlainHTML\\PlainButton", $button);

        return $button;
    }

    public function testTextInput()
    {
        $textInput = self::$factory->createTextInput("firstname", "Your name");

        $this->assertInstanceOf("DesignPatterns\\Creational\\AbstractFactory\\PlainHTML\\PlainTextInput", $textInput);

        return $textInput;
    }

    public function testTextPageCreation()
    {
        $page = self::$factory->createPage();

        $this->assertInstanceOf("DesignPatterns\\Creational\\AbstractFactory\\PlainHTML\\PlainPage", $page);

        return $page;
    }

    /**
     * @depends testTextPageCreation
     * @depends testButton
     * @depends testTextInput
     *
     * @param PlainPage $page
     */
    public function testTextPage(PlainPage $page, PlainButton $button, PlainTextInput $textInput)
    {
        $page->addElement($textInput);
        $page->addElement($button);

        $page->render();

        $this->expectOutputRegex("/firstname(.*\n*.*)Submit/");
    }
}