<?php
namespace DesignPatterns\Behavioral\TemplateMethod\Test;

use DesignPatterns\Behavioral\TemplateMethod\AbstractVoter;
use DesignPatterns\Behavioral\TemplateMethod\SplDoublyLinkedListVoter;

/**
 * Test @see SplDoublyLinkedListVoterTest
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class SplDoublyLinkedListVoterTest extends \PHPUnit_Framework_TestCase
{
    public function testAccessGranted()
    {
        $voter = new SplDoublyLinkedListVoter();

        $list = new \SplDoublyLinkedList();

        $this->assertEquals(AbstractVoter::ACCESS_GRANTED, $voter->vote($list, "unshift"));
        $this->assertEquals(AbstractVoter::ACCESS_GRANTED, $voter->vote($list, "push"));

        $list->push("foo");
        $list->push("bar");

        $this->assertEquals(AbstractVoter::ACCESS_GRANTED, $voter->vote($list, "shift"));
        $this->assertEquals(AbstractVoter::ACCESS_GRANTED, $voter->vote($list, "pop"));
    }

    public function testAccessDenied()
    {
        $voter = new SplDoublyLinkedListVoter();

        $list = new \SplDoublyLinkedList();

        $this->assertEquals(AbstractVoter::ACCESS_DENIED, $voter->vote($list, "shift"));
        $this->assertEquals(AbstractVoter::ACCESS_DENIED, $voter->vote($list, "pop"));
    }

    public function testAbstain()
    {
        $voter = new SplDoublyLinkedListVoter();

        $doublyLinkedList = new \SplDoublyLinkedList();
        $this->assertEquals(AbstractVoter::ABSTAINED, $voter->vote($doublyLinkedList, "next"));

        $fixedArray = new \SplFixedArray(10);
        $this->assertEquals(AbstractVoter::ABSTAINED, $voter->vote($fixedArray, "toArray"));
    }
}
