<?php

namespace DesignPatterns\Structural\Bridge\Test;

use DesignPatterns\Behavioral\Command\Command\BottomCommand;
use DesignPatterns\Behavioral\Command\Command\LeftCommand;
use DesignPatterns\Behavioral\Command\Command\RightCommand;
use DesignPatterns\Behavioral\Command\Command\TopCommand;
use DesignPatterns\Behavioral\Command\Field;
use DesignPatterns\Behavioral\Command\Joystick;
use DesignPatterns\Behavioral\Command\Point;

/**
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class CommandTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Joystick
     */
    private $joystick;

    /**
     * @var Field
     */
    private $field;

    protected function setUp()
    {
        $this->field = new Field(new Point(0, 0), new Point(2, 2));

        $this->joystick = new Joystick();
        $this->joystick->addKey('left', new LeftCommand($this->field));
        $this->joystick->addKey('right', new RightCommand($this->field));
        $this->joystick->addKey('top', new TopCommand($this->field));
        $this->joystick->addKey('bottom', new BottomCommand($this->field));
    }

    public function testReachGoal()
    {
        $this->assertFalse($this->field->checkGoal());

        $this->joystick->pressKey('bottom');
        $this->assertEquals(new Point(0, 1), $this->field->getPlayer());
        $this->assertFalse($this->field->checkGoal());

        $this->joystick->pressKey('bottom');
        $this->assertEquals(new Point(0, 2), $this->field->getPlayer());
        $this->assertFalse($this->field->checkGoal());

        $this->joystick->pressKey('top');
        $this->assertEquals(new Point(0, 1), $this->field->getPlayer());
        $this->assertFalse($this->field->checkGoal());

        $this->joystick->undo();
        $this->assertEquals(new Point(0, 2), $this->field->getPlayer());
        $this->assertFalse($this->field->checkGoal());

        $this->joystick->pressKey('right');
        $this->assertEquals(new Point(1, 2), $this->field->getPlayer());
        $this->assertFalse($this->field->checkGoal());

        $this->joystick->pressKey('right');
        $this->assertEquals(new Point(2, 2), $this->field->getPlayer());
        $this->assertTrue($this->field->checkGoal());
    }
}
