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
            ->addElement(self::$textInputPrototype)
            ->addElement(self::$buttonPrototype)
        ;

        self::$renderer = new Renderer(self::$buttonPrototype, self::$textInputPrototype, self::$pagePrototype);
    }

    /**
     * Check that a plain html button is created properly
     */
    public function testPlainButtonCreation()
    {
        $button = self::$renderer->createButton();

        $this->assertInstanceOf(PlainButton::class, $button, "Plain html button must be created");
        $this->assertNotEquals(
            spl_object_hash(self::$buttonPrototype),
            spl_object_hash($button),
            "A new button must be a new object"
        );

        $button->render();
        $this->expectOutputString('<button>Submit</button>');
    }

    /**
     * Check that a plain html text input is created properly
     */
    public function testTextInputCreation()
    {
        $textInput = self::$renderer->createTextInput();

        $this->assertInstanceOf(PlainTextInput::class, $textInput, "Plain html text input must be created");
        $this->assertNotEquals(
            spl_object_hash(self::$textInputPrototype),
            spl_object_hash($textInput),
            "A new text input must be a new object"
        );

        $textInput->render();
        $expectedOutput = <<<EOT
<label for="first_name">Input your first name</label>
<input id="first_name" name="first_name">
EOT;
        $this->expectOutputString($expectedOutput);
    }

    /**
     * Check that a plain html page is created properly
     */
    public function testPageCreation()
    {
        $page = self::$renderer->createPage();

        $this->assertInstanceOf(PlainPage::class, $page, "Plain html page must be created");
        $this->assertNotEquals(
            spl_object_hash(self::$pagePrototype),
            spl_object_hash($page),
            "A new page must be a new object"
        );

        // Check out that children elements are cloned successfully
        $elements = $page->getElements();

        $this->assertInstanceOf(PlainTextInput::class, $elements[0], "The first element of a new page must be a plain text input");
        $this->assertNotEquals(
            spl_object_hash(self::$textInputPrototype),
            spl_object_hash($elements[0]),
            "A new page must hold a new text input"
        );

        $this->assertInstanceOf(PlainButton::class, $elements[1], "The second element of a new page must be a plain button");
        $this->assertNotEquals(
            spl_object_hash(self::$buttonPrototype),
            spl_object_hash($elements[1]),
            "A new page must hold a new button element"
        );

        $page->render();
        $expectedOutput = <<<EOT
<!doctype html><html lang="en"><body><label for="first_name">Input your first name</label>
<input id="first_name" name="first_name"><button>Submit</button></body></html>
EOT;
        $this->expectOutputString($expectedOutput);
    }
}
