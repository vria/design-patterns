<?php

namespace DesignPatterns\Behavioral\Visitor\Test;

use DesignPatterns\Behavioral\Visitor\FormFields\ChoiceField;
use DesignPatterns\Behavioral\Visitor\FormFields\EmailField;
use DesignPatterns\Behavioral\Visitor\FormFields\IntegerField;
use DesignPatterns\Behavioral\Visitor\Visitors\ValidatorVisitor;

/**
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class ValidatorVisitorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ValidatorVisitor
     */
    private $validatorVisitor;

    protected function setUp()
    {
        $this->validatorVisitor = new ValidatorVisitor();
    }

    public function testEmailFieldValid()
    {
        $emailField = new EmailField();
        $emailField->setViewValue('email@example.com');
        $emailField->accept($this->validatorVisitor);

        $this->assertNull($emailField->getError());
    }

    public function testEmailFieldNotValid()
    {
        $emailField = new EmailField();
        $emailField->setViewValue('email@examplecom');
        $emailField->accept($this->validatorVisitor);

        $this->assertEquals('email is not valid', $emailField->getError());
    }

    public function testEmailFieldRequiredEmpty()
    {
        $emailField = new EmailField();
        $emailField->setRequired(true);
        $emailField->accept($this->validatorVisitor);

        $this->assertEquals("field is required", $emailField->getError());
    }

    public function testEmailFieldNonRequiredEmpty()
    {
        $emailField = new EmailField();
        $emailField->accept($this->validatorVisitor);

        $this->assertNull($emailField->getError());
    }

    public function testIntegerValid()
    {
        $integerField = new IntegerField();
        $integerField->setViewValue("122");
        $integerField->accept($this->validatorVisitor);

        $this->assertNull($integerField->getError());
    }

    public function testIntegerNotValid()
    {
        $integerField = new IntegerField();
        $integerField->setViewValue("35.55");
        $integerField->accept($this->validatorVisitor);

        $this->assertEquals('integer is not valid', $integerField->getError());
    }

    public function testChoiceValid()
    {
        $choiceField = new ChoiceField();
        $choiceField->setChoices(array('red' => 'Red', 'blue' => 'Blue', 'green' => 'Green'));
        $choiceField->setViewValue("Blue");
        $choiceField->accept($this->validatorVisitor);

        $this->assertNull($choiceField->getError());
    }

    public function testChoiceNotValid()
    {
        $choiceField = new ChoiceField();
        $choiceField->setChoices(array('red' => 'Red', 'blue' => 'Blue', 'green' => 'Green'));
        $choiceField->setViewValue("Yellow");
        $choiceField->accept($this->validatorVisitor);

        $this->assertEquals('choice is not valid', $choiceField->getError());
    }
}
