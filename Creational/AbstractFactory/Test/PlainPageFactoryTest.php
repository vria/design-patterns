<?php

namespace DesignPatterns\Creational\AbstractFactory\Test;

use DesignPatterns\Creational\AbstractFactory\Plain\PlainButton;
use DesignPatterns\Creational\AbstractFactory\Plain\PlainPage;
use DesignPatterns\Creational\AbstractFactory\Plain\PlainPageFactory;
use DesignPatterns\Creational\AbstractFactory\Plain\PlainTextInput;

/**
 * @author Vlad Riabchenko <contact@vria.eu>
 */
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

    /**
     * @return PlainButton
     */
    public function testButton()
    {
        $button = self::$factory->createButton("Submit");

        $this->assertInstanceOf(PlainButton::class, $button);

        return $button;
    }

    /**
     * @return PlainTextInput
     */
    public function testTextInput()
    {
        $textInput = self::$factory->createTextInput("firstname", "Your name");

        $this->assertInstanceOf(PlainTextInput::class, $textInput);

        return $textInput;
    }

    /**
     * @return PlainPage
     */
    public function testTextPageCreation()
    {
        $page = self::$factory->createPage();

        $this->assertInstanceOf(PlainPage::class, $page);

        return $page;
    }

    /**
     * @depends testTextPageCreation
     * @depends testButton
     * @depends testTextInput
     *
     * @param PlainPage $page
     * @param PlainButton $button
     * @param PlainTextInput $textInput
     */
    public function testTextPage(PlainPage $page, PlainButton $button, PlainTextInput $textInput)
    {
        $this->expectOutputRegex("/firstname(.*\n*.*)Submit/");

        $page->addElement($textInput)
             ->addElement($button)
             ->render();
    }
}
