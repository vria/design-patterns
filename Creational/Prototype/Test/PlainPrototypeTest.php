<?php

namespace DesignPatterns\Creational\Prototype\Test;

use DesignPatterns\Creational\Prototype\Plain\PlainButton;
use DesignPatterns\Creational\Prototype\Plain\PlainPage;
use DesignPatterns\Creational\Prototype\Plain\PlainTextInput;
use DesignPatterns\Creational\Prototype\Renderer;

/**
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class PlainPrototypeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Renderer
     */
    private static $renderer;

    /**
     * @var PlainButton
     */
    private static $buttonPrototype;

    /**
     * @var PlainTextInput
     */
    private static $textInputPrototype;

    /**
     * @var PlainPage
     */
    private static $pagePrototype;

    public static function setUpBeforeClass()
    {
        self::$buttonPrototype = new PlainButton('Submit');

        self::$textInputPrototype = new PlainTextInput('first_name', 'Input your first name');

        self::$pagePrototype = (new PlainPage)
            ->addElement(self::$buttonPrototype)
            ->addElement(self::$textInputPrototype)
        ;

        self::$renderer = new Renderer(self::$buttonPrototype, self::$textInputPrototype, self::$pagePrototype);
    }

    public function testPlainButtonCreation()
    {
        $button = self::$renderer->createButton();

        $this->assertInstanceOf(PlainButton::class, $button, "Plain html button must be created");

        $this->assertNotEquals(spl_object_hash(self::$buttonPrototype), spl_object_hash($button), "A new button must be a new object");

        $button->render();
        $this->expectOutputString('<button>Submit</button>');
    }

    public function testTextInputCreation()
    {
        $textInput = self::$renderer->createTextInput();

        $this->assertInstanceOf(PlainTextInput::class, $textInput, "Plain html text input must be created");
        $this->assertNotEquals(spl_object_hash(self::$textInputPrototype), spl_object_hash($textInput), "A new html input must be a new object");

        $textInput->render();
        $expectedOutput = <<<EOT
<label for="first_name">Input your first name</label>
<input id="first_name" name="first_name">
EOT;
        $this->expectOutputString($expectedOutput);
    }
}
