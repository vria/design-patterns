<?php

namespace DesignPatterns\Behavioral\Visitor\Test;

use DesignPatterns\Behavioral\Visitor\FormFields\ChoiceField;
use DesignPatterns\Behavioral\Visitor\FormFields\EmailField;
use DesignPatterns\Behavioral\Visitor\FormFields\IntegerField;
use DesignPatterns\Behavioral\Visitor\Visitors\ViewToModelTransformVisitor;

/**
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class ViewToModelTransformVisitorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ViewToModelTransformVisitor
     */
    private $viewToModelTransformVisitor;

    protected function setUp()
    {
        $this->viewToModelTransformVisitor = new ViewToModelTransformVisitor();
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
        $emailField->setError('email is not valid');

        $emailField->accept($this->viewToModelTransformVisitor);
        $this->assertNull($emailField->getValue());
    }

    public function testIntegerValid()
    {
        $integerField = new IntegerField();
        $integerField->setViewValue("335");

        $integerField->accept($this->viewToModelTransformVisitor);
        $this->assertEquals(335, $integerField->getValue());
    }

    public function testIntegerNotValid()
    {
        $integerField = new IntegerField();
        $integerField->setViewValue('552.57');
        $integerField->setError('integer is not valid');

        $integerField->accept($this->viewToModelTransformVisitor);
        $this->assertNull($integerField->getValue());
    }

    public function testChoiceValid()
    {
        $choiceField = new ChoiceField();
        $choiceField->setChoices(['red' => 'Red', 'blue' => 'Blue', 'green' => 'Green']);
        $choiceField->setViewValue('Red');
        $choiceField->accept($this->viewToModelTransformVisitor);

        $choiceField->accept($this->viewToModelTransformVisitor);
        $this->assertEquals('red', $choiceField->getValue());
    }

    public function testChoiceNotValid()
    {
        $choiceField = new ChoiceField();
        $choiceField->setChoices(['red' => 'Red', 'blue' => 'Blue', 'green' => 'Green']);
        $choiceField->setViewValue('Pink');
        $choiceField->setError('choice is not valid');
        $choiceField->accept($this->viewToModelTransformVisitor);

        $choiceField->accept($this->viewToModelTransformVisitor);
        $this->assertNull($choiceField->getValue());
    }
}
