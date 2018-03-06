<?php

namespace DesignPatterns\Creational\Prototype\Test;

use DesignPatterns\Creational\Prototype\Bootstrap\BootstrapButton;
use DesignPatterns\Creational\Prototype\Bootstrap\BootstrapPage;
use DesignPatterns\Creational\Prototype\Bootstrap\BootstrapTextInput;
use DesignPatterns\Creational\Prototype\Renderer;

/**
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class BootstrapPrototypeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Renderer
     */
    private static $renderer;

    /**
     * @var BootstrapButton
     */
    private static $buttonPrototype;

    /**
     * @var BootstrapTextInput
     */
    private static $textInputPrototype;

    /**
     * @var BootstrapPage
     */
    private static $pagePrototype;

    public static function setUpBeforeClass()
    {
        self::$buttonPrototype = new BootstrapButton('Submit');

        self::$textInputPrototype = new BootstrapTextInput('first_name', 'Input your first name');

        self::$pagePrototype = (new BootstrapPage)
            ->addElement(self::$textInputPrototype)
            ->addElement(self::$buttonPrototype)
        ;

        self::$renderer = new Renderer(self::$buttonPrototype, self::$textInputPrototype, self::$pagePrototype);
    }

    /**
     * Check that a bootstrap html button is created properly
     */
    public function testBootstrapButtonCreation()
    {
        $button = self::$renderer->createButton();

        $this->assertInstanceOf(BootstrapButton::class, $button, "Bootstrap html button must be created");
        $this->assertNotEquals(
            spl_object_hash(self::$buttonPrototype),
            spl_object_hash($button),
            "A new button must be a new object"
        );

        $button->render();
        $this->expectOutputString('<button class="btn btn-primary">Submit</button>');
    }

    /**
     * Check that a bootstrap html text input is created properly
     */
    public function testTextInputCreation()
    {
        $textInput = self::$renderer->createTextInput();

        $this->assertInstanceOf(BootstrapTextInput::class, $textInput, "Bootstrap html text input must be created");
        $this->assertNotEquals(
            spl_object_hash(self::$textInputPrototype),
            spl_object_hash($textInput),
            "A new text input must be a new object"
        );

        $textInput->render();
        $expectedOutput = <<<EOT
<div class="form-group">
    <label for="first_name">Input your first name</label>
    <input class="form-control" id="first_name" name="first_name">
</div>
EOT;
        $this->expectOutputString($expectedOutput);
    }

    /**
     * Check that a bootstrap html page is created properly
     */
    public function testPageCreation()
    {
        $page = self::$renderer->createPage();

        $this->assertInstanceOf(BootstrapPage::class, $page, "Bootstrap html page must be created");
        $this->assertNotEquals(
            spl_object_hash(self::$pagePrototype),
            spl_object_hash($page),
            "A new page must be a new object"
        );

        // Check out that children elements are cloned successfully
        $elements = $page->getElements();

        $this->assertInstanceOf(BootstrapTextInput::class, $elements[0], "The first element of a new page must be a bootstrap text input");
        $this->assertNotEquals(
            spl_object_hash(self::$textInputPrototype),
            spl_object_hash($elements[0]),
            "A new page must hold a new text input"
        );

        $this->assertInstanceOf(BootstrapButton::class, $elements[1], "The second element of a new page must be a bootstrap button");
        $this->assertNotEquals(
            spl_object_hash(self::$buttonPrototype),
            spl_object_hash($elements[1]),
            "A new page must hold a new button element"
        );

        $page->render();
        $expectedOutput = <<<EOT
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </head>
    <body class="container"><div class="form-group">
    <label for="first_name">Input your first name</label>
    <input class="form-control" id="first_name" name="first_name">
</div><button class="btn btn-primary">Submit</button></body></html>
EOT;
        $this->expectOutputString($expectedOutput);
    }
}
