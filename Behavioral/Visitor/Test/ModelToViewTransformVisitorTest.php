<?php

namespace DesignPatterns\Behavioral\Visitor\Test;

use DesignPatterns\Behavioral\Visitor\FormFields\CheckboxesField;
use DesignPatterns\Behavioral\Visitor\FormFields\EmailField;
use DesignPatterns\Behavioral\Visitor\FormFields\IntegerField;
use DesignPatterns\Behavioral\Visitor\Visitors\ModelToViewTransformerVisitor;

/**
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class ModelToViewTransformVisitorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ModelToViewTransformerVisitor
     */
    private $modelToViewTransformVisitor;

    protected function setUp()
    {
        $this->modelToViewTransformVisitor = new ModelToViewTransformerVisitor();
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
        $choiceField = new CheckboxesField();
        $choiceField->setChoices(['Red' => 1, 'Blue' => 2, 'Green' => 3]);
        $choiceField->setValue([1, 3]);
        $choiceField->accept($this->modelToViewTransformVisitor);

        $this->assertEquals(['Red', 'Green'], $choiceField->getViewValue());
    }
}
