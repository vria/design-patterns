<?php

namespace DesignPatterns\Behavioral\Visitor\Visitors;

use DesignPatterns\Behavioral\Visitor\FormField;
use DesignPatterns\Behavioral\Visitor\FormFields\ChoiceField;
use DesignPatterns\Behavioral\Visitor\FormFields\EmailField;
use DesignPatterns\Behavioral\Visitor\FormFields\IntegerField;
use DesignPatterns\Behavioral\Visitor\Visitor;

/**
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class ValidatorVisitor implements Visitor
{
    /**
     * @param FormField $formField
     * @return bool
     */
    private function checkRequired(FormField $formField)
    {
        if ($formField->isRequired() && strlen($formField->getViewValue()) == 0) {
            $formField->setError('field is required');

            return false;
        }

        return true;
    }

    /**
     * @param EmailField $emailField
     */
    public function visitEmail(EmailField $emailField)
    {
        if ($this->checkRequired($emailField)
            && strlen($emailField->getViewValue()) > 0
            && filter_var($emailField->getViewValue(), FILTER_VALIDATE_EMAIL) === false
        ) {
            $emailField->setError("email is not valid");
        }
    }

    /**
     * @param IntegerField $integerField
     */
    public function visitInteger(IntegerField $integerField)
    {
        if ($this->checkRequired($integerField)
            && strlen($integerField->getViewValue()) > 0
            && filter_var($integerField->getViewValue(), FILTER_VALIDATE_INT) === false
        ) {
            $integerField->setError("integer is not valid");
        }
    }

    /**
     * @param ChoiceField $choiceField
     */
    public function visitChoice(ChoiceField $choiceField)
    {
        if ($this->checkRequired($choiceField)
            && strlen($choiceField->getViewValue()) > 0
            && !in_array($choiceField->getViewValue(), $choiceField->getChoices())
        ) {
            $choiceField->setError("choice is not valid");
        }
    }
}
