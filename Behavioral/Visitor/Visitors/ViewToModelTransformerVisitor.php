<?php

namespace DesignPatterns\Behavioral\Visitor\Visitors;

use DesignPatterns\Behavioral\Visitor\FormFields\CheckboxesField;
use DesignPatterns\Behavioral\Visitor\FormFields\EmailField;
use DesignPatterns\Behavioral\Visitor\FormFields\IntegerField;
use DesignPatterns\Behavioral\Visitor\VisitorInterface;

/**
 * Visitor that transforms view value to model value. When the field is not valid then the model value is null.
 *
 * It corresponds to `ConcreteVisitor` in the Strategy pattern.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class ViewToModelTransformerVisitor implements VisitorInterface
{
    /**
     * @param EmailField $emailField
     */
    public function visitEmail(EmailField $emailField)
    {
        $value = null;
        if (!$emailField->getError()) {
            // Set the email model value only when there is no validation error.
            $value = $emailField->getViewValue();
        }

        $emailField->setValue($value);
    }

    /**
     * @param IntegerField $integerField
     */
    public function visitInteger(IntegerField $integerField)
    {
        $value = null;
        if (!$integerField->getError()) {
            // Set the integer model value only when there is no validation error.
            $value = intval($integerField->getViewValue());
        }

        $integerField->setValue($value);
    }

    /**
     * @param CheckboxesField $checkboxesField
     */
    public function visitCheckboxes(CheckboxesField $checkboxesField)
    {
        $values = null;
        if (!$checkboxesField->getError()) {
            // Set the checkboxes model value only when there is no validation error.
            $values = [];

            $choices = $checkboxesField->getChoices();

            // For each view value find a corresponding model value and add it to the array of view values.
            foreach ($checkboxesField->getViewValue() as $viewValue) {
                $values[] = $choices[$viewValue];
            }
        }

        $checkboxesField->setValue($values);
    }
}
