<?php

namespace DesignPatterns\Structural\Composite\Tests;

use DesignPatterns\Structural\Composite\Form;
use DesignPatterns\Structural\Composite\SubmitWidget;
use DesignPatterns\Structural\Composite\TextWidget;

/**
 * Class CompositeTest
 * @package DesignPatterns\Structural\Composite\Tests
 */
class CompositeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @return TextWidget
     */
    public function testTextWidget()
    {
        $this->expectOutputRegex("/type=\"text\"/");

        $text = new TextWidget("firstname");
        $text->render();

        return $text;
    }

    /**
     * @return SubmitWidget
     */
    public function testSubmitWidget()
    {
        $this->expectOutputRegex("/type=\"submit\"/");

        $submit = new SubmitWidget("ok");
        $submit->render();

        return $submit;
    }

    /**
     * @depends testTextWidget
     * @depends testSubmitWidget
     *
     * @param TextWidget $text
     * @param SubmitWidget $submit
     */
    public function testChildOfForm(TextWidget $text, SubmitWidget $submit)
    {
        $form = new Form("myform");
        $form->add($text);
        $form->add($submit);

        $this->assertInstanceOf("DesignPatterns\\Structural\\Composite\\TextWidget", $form->get("firstname"));
        $this->assertInstanceOf("DesignPatterns\\Structural\\Composite\\SubmitWidget", $form->get("ok"));
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testChildNotExists()
    {
        $form = new Form("myform");
        $form->get('unexistingChild');
    }

    /**
     * @expectedException \BadMethodCallException
     * @depends testTextWidget
     *
     * @param TextWidget $text
     */
    public function testSimpleElementException(TextWidget $text)
    {
        $text->get('unexistingChild');
    }
}
