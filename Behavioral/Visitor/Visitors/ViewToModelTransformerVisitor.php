<?php

namespace DesignPatterns\Behavioral\Visitor\Visitors;

use DesignPatterns\Behavioral\Visitor\FormFields\CheckboxesField;
use DesignPatterns\Behavioral\Visitor\FormFields\EmailField;
use DesignPatterns\Behavioral\Visitor\FormFields\IntegerField;
use DesignPatterns\Behavioral\Visitor\VisitorInterface;

/**
 * Transform view value to model value. When the field is not valid then the model value is null.
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
        // Set the email model value only when there is no validation error.
        if (!$emailField->getError()) {
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
        $viewValue = $integerField->getViewValue();

        // Set the integer model value only when there is no validation error.
        if (!$integerField->getError()) {
            $integerField->setValue(intval($viewValue));
        } else {
            $integerField->setValue(null);
        }
    }

    /**
     * @param CheckboxesField $checkboxesField
     */
    public function visitCheckboxes(CheckboxesField $checkboxesField)
    {
        // Set the checkboxes model value only when there is no validation error.
        if (!$checkboxesField->getError()) {
            $modelValues = [];

            $choices = $checkboxesField->getChoices();

            // For each view value find a corresponding model value and add it to the array of view values.
            foreach ($checkboxesField->getViewValue() as $value) {
                $modelValues[] = $choices[$value];
            }

            $checkboxesField->setValue($modelValues);
        } else {
            $checkboxesField->setValue(null);
        }
    }
}
