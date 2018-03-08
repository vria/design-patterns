<?php

namespace DesignPatterns\Behavioral\Visitor;

/**
 * Basic class for a form field.
 * It defines common properties and methods to all form fields.
 * On top of that there is an abstract @see FormField::accept method that takes a visitor as an argument.
 * Through this method the form fields can be extended by introducing a new concrete visitor.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
abstract class FormField
{
    /**
     * Model value for PHP processing.
     *
     * @var mixed
     */
    private $value;

    /**
     * View value for HTML page.
     *
     * @var mixed
     */
    private $viewValue;

    /**
     * Required flag.
     *
     * @var boolean
     */
    private $required = false;

    /**
     * Error message.
     *
     * @var string
     */
    private $error;

    /**
     * Accept a visitor.
     * A concrete form field will request the visitor to perform its operation.
     * The name of requested operation depends on the concrete form field class.
     *
     * @param VisitorInterface $visitor
     */
    public abstract function accept(VisitorInterface $visitor);

    /**
     * Get view value.
     *
     * @return mixed
     */
    public function getViewValue()
    {
        return $this->viewValue;
    }

    /**
     * Set view value.
     *
     * @param mixed $viewValue
     */
    public function setViewValue($viewValue)
    {
        $this->viewValue = $viewValue;
    }

    /**
     * Get value.
     *
     * @return mixed|null
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set value.
     *
     * @param mixed $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * Check if the field is required.
     *
     * @return boolean
     */
    public function isRequired()
    {
        return $this->required;
    }

    /**
     * Set required flag.
     *
     * @param boolean $required
     */
    public function setRequired($required)
    {
        $this->required = $required;
    }

    /**
     * Get error message.
     *
     * @return string|null
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * Set error message.
     *
     * @param string $error
     */
    public function setError($error)
    {
        $this->error = $error;
    }
}
