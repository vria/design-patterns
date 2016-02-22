<?php

namespace DesignPatterns\Behavioral\Visitor\Visitors;

use DesignPatterns\Behavioral\Visitor\FormFields\ChoiceField;
use DesignPatterns\Behavioral\Visitor\FormFields\EmailField;
use DesignPatterns\Behavioral\Visitor\FormFields\IntegerField;
use DesignPatterns\Behavioral\Visitor\Visitor;

class ModelToViewTransformVisitor implements Visitor
{
    /**
     * @param EmailField $emailField
     */
    public function visitEmail(EmailField $emailField)
    {
        $emailField->setViewValue($emailField->getValue());
    }

    /**
     * @param IntegerField $integerField
     */
    public function visitInteger(IntegerField $integerField)
    {
        $integerField->setViewValue(strval($integerField->getValue()));
    }

    /**
     * @param ChoiceField $choiceField
     */
    public function visitChoice(ChoiceField $choiceField)
    {
        if ($choiceField->getValue()) {
            $choiceField->setViewValue($choiceField->getChoices()[$choiceField->getValue()]);
        }
    }
}
