<?php

namespace DesignPatterns\Creational\AbstractFactory\Test;

use DesignPatterns\Creational\AbstractFactory\Bootstrap\BootstrapButton;
use DesignPatterns\Creational\AbstractFactory\Bootstrap\BootstrapPage;
use DesignPatterns\Creational\AbstractFactory\Bootstrap\BootstrapPageFactory;
use DesignPatterns\Creational\AbstractFactory\Bootstrap\BootstrapTextInput;

/**
 * @author Vlad Riabchenko <contact@vria.eu>
 */
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

    /**
     * @return BootstrapButton
     */
    public function testButton()
    {
        $button = self::$factory->createButton("Submit");

        $this->assertInstanceOf(BootstrapButton::class, $button);

        return $button;
    }

    /**
     * @return BootstrapTextInput
     */
    public function testTextInput()
    {
        $textInput = self::$factory->createTextInput("firstname", "Your name");

        $this->assertInstanceOf(BootstrapTextInput::class, $textInput);

        return $textInput;
    }

    /**
     * @return BootstrapPage
     */
    public function testTextPageCreation()
    {
        $page = self::$factory->createPage();

        $this->assertInstanceOf(BootstrapPage::class, $page);

        return $page;
    }


    /**
     * @depends testTextPageCreation
     * @depends testButton
     * @depends testTextInput
     *
     * @param BootstrapPage $page
     * @param BootstrapButton $button
     * @param BootstrapTextInput $textInput
     */
    public function testTextPage(BootstrapPage $page, BootstrapButton $button, BootstrapTextInput $textInput)
    {
        $this->expectOutputRegex("/firstname(.*\n*.*)Submit/");

        $page->addElement($textInput)
             ->addElement($button)
             ->render();
    }
}
