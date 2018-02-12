<?php

namespace DesignPatterns\Behavioral\Visitor\Test;

use DesignPatterns\Behavioral\Visitor\FormFields\ChoiceField;
use DesignPatterns\Behavioral\Visitor\FormFields\EmailField;
use DesignPatterns\Behavioral\Visitor\FormFields\IntegerField;
use DesignPatterns\Behavioral\Visitor\Visitors\ModelToViewTransformVisitor;

/**
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class ModelToViewTransformVisitorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ModelToViewTransformVisitor
     */
    private $modelToViewTransformVisitor;

    protected function setUp()
    {
        $this->modelToViewTransformVisitor = new ModelToViewTransformVisitor();
    }

    public function testEmailField()
    {
        $emailField = new EmailField();
        $emailField->setValue('user@example.com');
        $emailField->accept($this->modelToViewTransformVisitor);

        $this->assertEquals('user@example.com', $emailField->getViewValue());
    }

    public function testIntegerField()
    {
        $integerField = new IntegerField();
        $integerField->setValue(269);
        $integerField->accept($this->modelToViewTransformVisitor);

        $this->assertEquals('269', $integerField->getViewValue());
    }

    public function testChoiceField()
    {
        $choiceField = new ChoiceField();
        $choiceField->setChoices(['red' => 'Red', 'blue' => 'Blue', 'green' => 'Green']);
        $choiceField->setValue('green');
        $choiceField->accept($this->modelToViewTransformVisitor);

        $this->assertEquals('Green', $choiceField->getViewValue());
    }
}
