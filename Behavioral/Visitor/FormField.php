<?php

namespace DesignPatterns\Behavioral\Visitor;


abstract class FormField
{
    /**
     * @var string
     */
    private $viewValue = "";

    /**
     * @var mixed
     */
    private $value;

    /**
     * @var boolean
     */
    private $required = false;

    /**
     * @var string
     */
    private $error;

    /**
     * @param Visitor $visitor
     */
    public abstract function accept(Visitor $visitor);

    /**
     * @return string
     */
    public function getViewValue()
    {
        return $this->viewValue;
    }

    /**
     * @param string $viewValue
     */
    public function setViewValue($viewValue)
    {
        $this->viewValue = $viewValue;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @return boolean
     */
    public function isRequired()
    {
        return $this->required;
    }

    /**
     * @param boolean $required
     */
    public function setRequired($required)
    {
        $this->required = $required;
    }

    /**
     * @return string
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * @param string $error
     */
    public function setError($error)
    {
        $this->error = $error;
    }
}
