<?php

namespace DesignPatterns\Creational\AbstractFactory\Test;

use DesignPatterns\Creational\AbstractFactory\Bootstrap\BootstrapButton;
use DesignPatterns\Creational\AbstractFactory\Bootstrap\BootstrapPage;
use DesignPatterns\Creational\AbstractFactory\Bootstrap\BootstrapPageFactory;
use DesignPatterns\Creational\AbstractFactory\Bootstrap\BootstrapTextInput;

class BootstrapPageFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var BootstrapPageFactory
     */
    protected static $factory;

    public static function setUpBeforeClass()
    {
        self::$factory = new BootstrapPageFactory();
    }

    public function testButton()
    {
        $button = self::$factory->createButton("Submit");

        $this->assertInstanceOf("DesignPatterns\\Creational\\AbstractFactory\\Bootstrap\\BootstrapButton", $button);

        return $button;
    }

    public function testTextInput()
    {
        $textInput = self::$factory->createTextInput("firstname", "Your name");

        $this->assertInstanceOf("DesignPatterns\\Creational\\AbstractFactory\\Bootstrap\\BootstrapTextInput", $textInput);

        return $textInput;
    }

    public function testTextPageCreation()
    {
        $page = self::$factory->createPage();

        $this->assertInstanceOf("DesignPatterns\\Creational\\AbstractFactory\\Bootstrap\\BootstrapPage", $page);

        return $page;
    }

    /**
     * @depends testTextPageCreation
     * @depends testButton
     * @depends testTextInput
     *
     * @param BootstrapPage $page
     */
    public function testTextPage(BootstrapPage $page, BootstrapButton $button, BootstrapTextInput $textInput)
    {
        $page->addElement($textInput);
        $page->addElement($button);

        $page->render();

        $this->expectOutputRegex("/firstname(.*\n*.*)Submit/");
    }
}