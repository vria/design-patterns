<?php

namespace DesignPatterns\Behavioral\TemplateMethod;

abstract class AbstractVoter
{
    const ACCESS_GRANTED = "ACCESS_GRANTED";
    const ACCESS_DENIED = "ACCESS_DENIED";
    const ABSTAINED = "ABSTAINED";

    /**
     * @return string
     */
    protected abstract function supportedClass();

    /**
     * @return array
     */
    protected abstract function supportedAttributes();

    /**
     * @param $object
     * @param $attribute
     * @return bool
     */
    protected abstract function hasAccess($object, $attribute);

    /**
     * @param mixed $object
     * @param mixed $attribute
     * @return string
     */
    public function vote($object, $attribute)
    {
        if ($this->supportedClass() == get_class($object)
            && in_array($attribute, $this->supportedAttributes())
        ) {
            return $this->hasAccess($object, $attribute)
                ? self::ACCESS_GRANTED
                : self::ACCESS_DENIED;
        }

        return self::ABSTAINED;
    }
}
