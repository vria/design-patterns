<?php

namespace DesignPatterns\Behavioral\TemplateMethod\Test;

use DesignPatterns\Behavioral\TemplateMethod\SplFixedArrayVoter;
use DesignPatterns\Behavioral\TemplateMethod\AbstractVoter;

/**
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class SplFixedArrayVoterTest extends \PHPUnit_Framework_TestCase
{
    public function testAccessGranted()
    {
        $voter = new SplFixedArrayVoter();
        $hasAccess = $voter->vote(new \SplFixedArray(10), 'toArray');

        $this->assertEquals(AbstractVoter::ACCESS_GRANTED, $hasAccess);
    }

    public function testAccessDenied()
    {
        $voter = new SplFixedArrayVoter();
        $hasAccess = $voter->vote(new \SplFixedArray(), 'toArray');

        $this->assertEquals(AbstractVoter::ACCESS_DENIED, $hasAccess);
    }

    public function accessAbstain()
    {
        $voter = new SplFixedArrayVoter();

        $doublyLinkedList = new \SplDoublyLinkedList();
        $this->assertEquals(AbstractVoter::ABSTAINED, $voter->vote($doublyLinkedList, "push"));

        $fixedArray = new \SplFixedArray(10);
        $this->assertEquals(AbstractVoter::ABSTAINED, $voter->vote($fixedArray, "count"));
    }
}
