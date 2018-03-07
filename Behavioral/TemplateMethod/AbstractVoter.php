<?php

namespace DesignPatterns\Behavioral\TemplateMethod;

/**
 * Abstract class that defines a common algorithm of voting.
 * To determine whether the attribute of a particular object is accessible call @see AbstractVoter::vote() method.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
abstract class AbstractVoter
{
    const ACCESS_GRANTED = "ACCESS_GRANTED";
    const ACCESS_DENIED = "ACCESS_DENIED";
    const ABSTAINED = "ABSTAINED";

    /**
     * Check if the voting on this object is supported.
     *
     * @param object $object
     *
     * @return bool
     */
    protected abstract function supportsObject($object);

    /**
     * Check if the voting on this attribute is supported.
     *
     * @param string $attribute
     *
     * @return bool
     */
    protected abstract function supportsAttribute($attribute);

    /**
     * Decide whether the provided attribute of the provided object is accessible.
     *
     * @param $object
     * @param $attribute
     *
     * @return bool
     */
    protected abstract function hasAccess($object, $attribute);

    /**
     * Common algorithm of voting:
     * - if the object and attribute are supported then check access,
     * - abstain otherwise.
     *
     * This is a template method in terms of the Template method pattern.
     *
     * @param object $object
     * @param string $attribute
     *
     * @return string
     */
    public function vote($object, $attribute)
    {
        if ($this->supportsObject($object) && $this->supportsAttribute($attribute)) {
            return $this->hasAccess($object, $attribute)
                ? self::ACCESS_GRANTED
                : self::ACCESS_DENIED;
        }

        return self::ABSTAINED;
    }
}
