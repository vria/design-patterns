<?php

namespace DesignPatterns\Behavioral\Visitor\Visitors;

use DesignPatterns\Behavioral\Visitor\FormFields\ChoiceField;
use DesignPatterns\Behavioral\Visitor\FormFields\EmailField;
use DesignPatterns\Behavioral\Visitor\FormFields\IntegerField;
use DesignPatterns\Behavioral\Visitor\Visitor;

/**
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class ViewToModelTransformVisitor implements Visitor
{
    /**
     * @param EmailField $emailField
     */
    public function visitEmail(EmailField $emailField)
    {
        if (!$emailField->getError() && strlen($emailField->getViewValue()) > 0) {
            $emailField->setValue($emailField->getViewValue());
        } else {
            $emailField->setValue(null);
        }
    }

    /**
     * @param IntegerField $integerField
     */
    public function visitInteger(IntegerField $integerField)
    {
        if (!$integerField->getError() && strlen($integerField->getViewValue()) > 0) {
            $integerField->setValue(intval($integerField->getViewValue()));
        } else {
            $integerField->setValue(null);
        }
    }

    /**
     * @param ChoiceField $choiceField
     */
    public function visitChoice(ChoiceField $choiceField)
    {
        if (!$choiceField->getError() && strlen($choiceField->getViewValue()) > 0) {
            $choiceField->setValue(array_search($choiceField->getViewValue(), $choiceField->getChoices()));
        } else {
            $choiceField->setValue(null);
        }
    }
}
