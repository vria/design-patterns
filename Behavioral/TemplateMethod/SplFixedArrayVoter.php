<?php

namespace DesignPatterns\Behavioral\TemplateMethod;

/**
 * Voter to check if the methods of @see \SplFixedArray could be called.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class SplFixedArrayVoter extends AbstractVoter
{
    /**
     * @inheritdoc
     */
    protected function supportsObject($object)
    {
        return $object instanceof \SplFixedArray;
    }

    /**
     * @inheritdoc
     */
    protected function supportsAttribute($attribute)
    {
        // Other methods could be added
        return $attribute === 'toArray';
    }

    /**
     * @inheritdoc
     */
    protected function hasAccess($object, $attribute)
    {
        /** @var $object \SplFixedArray */

        // Let call `toArray` method only if the fixed array object is not empty
        return $object->count() > 0;
    }
}
