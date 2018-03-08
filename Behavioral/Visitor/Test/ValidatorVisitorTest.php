<?php

namespace DesignPatterns\Behavioral\Visitor\Test;

use DesignPatterns\Behavioral\Visitor\FormFields\CheckboxesField;
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

    public function testEmailValid()
    {
        $emailField = new EmailField();
        $emailField->setViewValue('email@example.com');
        $emailField->accept($this->validatorVisitor);

        $this->assertNull($emailField->getError());
    }

    public function testEmailNotValid()
    {
        $emailField = new EmailField();
        $emailField->setViewValue('email@examplecom');
        $emailField->accept($this->validatorVisitor);

        $this->assertEquals('Email is not valid.', $emailField->getError());
    }

    public function testEmailRequiredEmpty()
    {
        $emailField = new EmailField();
        $emailField->setRequired(true);
        $emailField->accept($this->validatorVisitor);

        $this->assertEquals("Field is required.", $emailField->getError());
    }

    public function testEmailNotRequiredEmptyValid()
    {
        $emailField = new EmailField();
        $emailField->setViewValue('');
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

        $this->assertEquals('Integer is not valid.', $integerField->getError());
    }

    public function testIntegerRequiredEmpty()
    {
        $integerField = new IntegerField();
        $integerField->setViewValue('');
        $integerField->setRequired(true);
        $integerField->accept($this->validatorVisitor);

        $this->assertEquals('Field is required.', $integerField->getError());
    }

    public function testIntegerNotRequiredEmptyValid()
    {
        $integerField = new EmailField();
        $integerField->setViewValue('');
        $integerField->accept($this->validatorVisitor);

        $this->assertNull($integerField->getError());
    }

    public function testChoiceValid()
    {
        $choiceField = new CheckboxesField();
        $choiceField->setChoices(['Red' => 1, 'Blue' => 2, 'Green' => 3]);
        $choiceField->setViewValue(['Blue', 'Green']);
        $choiceField->accept($this->validatorVisitor);

        $this->assertNull($choiceField->getError());
    }

    public function testChoiceValueNotAllowed()
    {
        $choiceField = new CheckboxesField();
        $choiceField->setChoices(['Red' => 1, 'Blue' => 2, 'Green' => 3]);
        $choiceField->setViewValue(['Yellow']);
        $choiceField->accept($this->validatorVisitor);

        $this->assertEquals('Choice is not allowed.', $choiceField->getError());
    }

    public function testChoiceRequiredEmpty()
    {
        $choiceField = new CheckboxesField();
        $choiceField->setChoices(['Red' => 1, 'Blue' => 2, 'Green' => 3]);
        $choiceField->setRequired(true);
        $choiceField->setViewValue([]);
        $choiceField->accept($this->validatorVisitor);

        $this->assertEquals('At least one choice is required.', $choiceField->getError());
    }

    public function testChoiceNotRequiredEmpty()
    {
        $choiceField = new CheckboxesField();
        $choiceField->setChoices(['Red' => 1, 'Blue' => 2, 'Green' => 3]);
        $choiceField->setViewValue([]);
        $choiceField->accept($this->validatorVisitor);

        $this->assertNull($choiceField->getError());
    }
}
