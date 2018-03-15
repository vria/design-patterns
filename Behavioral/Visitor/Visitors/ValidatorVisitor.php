<?php

namespace DesignPatterns\Behavioral\Visitor\Visitors;

use DesignPatterns\Behavioral\Visitor\FormFields\CheckboxesField;
use DesignPatterns\Behavioral\Visitor\FormFields\EmailField;
use DesignPatterns\Behavioral\Visitor\FormFields\IntegerField;
use DesignPatterns\Behavioral\Visitor\VisitorInterface;

/**
 * Visitor that validates the view value of form fields.
 *
 * It corresponds to `ConcreteVisitor` in the Strategy pattern.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class ValidatorVisitor implements VisitorInterface
{
    /**
     * Check that view value:
     * - is not empty when it is required,
     * - is a valid email address (empty value is ok when allowed).
     *
     * @param EmailField $emailField
     */
    public function visitEmail(EmailField $emailField)
    {
        $viewValue = $emailField->getViewValue();
        $empty = strlen($viewValue) === 0;

        if ($emailField->isRequired() && $empty) {
            $emailField->setError("Field is required.");

            return;
        }

        if (!$empty && filter_var($viewValue, FILTER_VALIDATE_EMAIL) === false) {
            $emailField->setError("Email is not valid.");
        }
    }

    /**
     * Check that view value:
     * - is not empty when it is required,
     * - is a valid integer (empty value is ok when allowed).
     *
     * @param IntegerField $integerField
     */
    public function visitInteger(IntegerField $integerField)
    {
        $viewValue = $integerField->getViewValue();
        $empty = strlen($viewValue) === 0;

        if ($integerField->isRequired() && $empty) {
            $integerField->setError("Field is required.");

            return;
        }

        if (!$empty && filter_var($viewValue, FILTER_VALIDATE_INT) === false) {
            $integerField->setError("Integer is not valid.");
        }
    }

    /**
     * Check that view value:
     * - is not empty when it is required,
     * - holds only allowed choices.
     *
     * @param CheckboxesField $checkboxesField
     */
    public function visitCheckboxes(CheckboxesField $checkboxesField)
    {
        $viewValues = $checkboxesField->getViewValue();
        $choices = array_keys($checkboxesField->getChoices());
        $empty = empty($viewValues);

        // Verify that field is not empty
        if ($checkboxesField->isRequired() && $empty) {
            $checkboxesField->setError("At least one choice is required.");

            return;
        }

        // Verify that all checked values are in the list of allowed choices
        foreach ($viewValues as $value) {
            if (!in_array($value, $choices)) {
                $checkboxesField->setError("Choice is not allowed.");

                return;
            }
        }
    }
}
