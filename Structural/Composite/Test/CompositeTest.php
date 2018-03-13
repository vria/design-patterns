<?php

namespace DesignPatterns\Structural\Composite\Test;

use DesignPatterns\Structural\Composite\FormWidget;
use DesignPatterns\Structural\Composite\SubmitWidget;
use DesignPatterns\Structural\Composite\TextWidget;

/**
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class CompositeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @return TextWidget
     */
    public function testTextWidget()
    {
        $text = new TextWidget("firstname");
        $text->render();

        $this->expectOutputRegex('<input type="text" name="firstname">');

        return $text;
    }

    /**
     * @return SubmitWidget
     */
    public function testSubmitWidget()
    {
        $submit = new SubmitWidget("ok");
        $submit->render();

        $this->expectOutputRegex('<input type="submit" name="ok">');

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
        $form = new FormWidget("myform");
        $form->add($text);
        $form->add($submit);

        $this->assertInstanceOf(TextWidget::class, $form->get("firstname"));
        $this->assertInstanceOf(SubmitWidget::class, $form->get("ok"));
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testChildNotExists()
    {
        $form = new FormWidget("myform");
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
