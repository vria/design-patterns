<?php

namespace DesignPatterns\Behavioral\Visitor\Test;

use DesignPatterns\Behavioral\Visitor\FormFields\CheckboxesField;
use DesignPatterns\Behavioral\Visitor\FormFields\EmailField;
use DesignPatterns\Behavioral\Visitor\FormFields\IntegerField;
use DesignPatterns\Behavioral\Visitor\Visitors\ViewToModelTransformerVisitor;

/**
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class ViewToModelTransformVisitorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ViewToModelTransformerVisitor
     */
    private $viewToModelTransformVisitor;

    protected function setUp()
    {
        $this->viewToModelTransformVisitor = new ViewToModelTransformerVisitor();
    }

    public function testEmailValid()
    {
        $emailField = new EmailField();
        $emailField->setViewValue('user@example.com');

        $emailField->accept($this->viewToModelTransformVisitor);
        $this->assertEquals('user@example.com', $emailField->getValue());
    }

    public function testEmailNotValid()
    {
        $emailField = new EmailField();
        $emailField->setViewValue('user@examplecom');
        $emailField->setError('Email is not valid.');

        $emailField->accept($this->viewToModelTransformVisitor);
        $this->assertNull($emailField->getValue());
    }

    public function testIntegerValid()
    {
        $integerField = new IntegerField();
        $integerField->setViewValue("335");

        $integerField->accept($this->viewToModelTransformVisitor);
        $this->assertSame(335, $integerField->getValue());
    }

    public function testIntegerNotValid()
    {
        $integerField = new IntegerField();
        $integerField->setViewValue('552.57');
        $integerField->setError('Integer is not valid.');

        $integerField->accept($this->viewToModelTransformVisitor);
        $this->assertNull($integerField->getValue());
    }

    public function testChoiceValid()
    {
        $choiceField = new CheckboxesField();
        $choiceField->setChoices(['Red' => 1, 'Blue' => 2, 'Green' => 3]);
        $choiceField->setViewValue(['Red', 'Blue']);

        $choiceField->accept($this->viewToModelTransformVisitor);
        $this->assertEquals([1, 2], $choiceField->getValue());
    }

    public function testChoiceNotValid()
    {
        $choiceField = new CheckboxesField();
        $choiceField->setChoices(['Red' => 1, 'Blue' => 2, 'Green' => 3]);
        $choiceField->setViewValue(['Pink']);
        $choiceField->setError('Choice is not allowed.');

        $choiceField->accept($this->viewToModelTransformVisitor);
        $this->assertEmpty($choiceField->getValue());
    }
}
