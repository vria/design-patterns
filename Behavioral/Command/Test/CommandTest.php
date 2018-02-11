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
        $this->field = new Field(new Point(1, 1), new Point(2, 2));

        $this->joystick = new Joystick();
        $this->joystick->addKey('left', new LeftCommand($this->field));
        $this->joystick->addKey('right', new RightCommand($this->field));
        $this->joystick->addKey('top', new TopCommand($this->field));
        $this->joystick->addKey('bottom', new BottomCommand($this->field));
    }

    public function testLeft()
    {
        $this->joystick->pressKey('left');
        $this->assertEquals(new Point(0, 1), $this->field->getPlayer());
    }

    public function testRight()
    {
        $this->joystick->pressKey('right');
        $this->assertEquals(new Point(2, 1), $this->field->getPlayer());
    }

    public function testTop()
    {
        $this->joystick->pressKey('top');
        $this->assertEquals(new Point(1, 0), $this->field->getPlayer());
    }

    public function testBottom()
    {
        $this->joystick->pressKey('bottom');
        $this->assertEquals(new Point(1, 2), $this->field->getPlayer());
    }

    public function testUndo()
    {
        $this->joystick->pressKey('bottom');
        $this->assertEquals(new Point(1, 2), $this->field->getPlayer());

        $this->joystick->undo();
        $this->assertEquals(new Point(1, 1), $this->field->getPlayer());
    }

    public function testReachGoal()
    {
        $this->assertFalse($this->field->checkGoal());

        $this->joystick->pressKey('bottom'); // 1, 2
        $this->assertFalse($this->field->checkGoal());

        $this->joystick->pressKey('bottom'); // 1, 3
        $this->assertFalse($this->field->checkGoal());

        $this->joystick->pressKey('right'); // 2, 3
        $this->assertFalse($this->field->checkGoal());

        $this->joystick->pressKey('right'); // 3, 3
        $this->assertFalse($this->field->checkGoal());

        $this->joystick->pressKey('top'); // 3, 2
        $this->assertFalse($this->field->checkGoal());

        $this->joystick->pressKey('left'); // 2, 2
        $this->assertTrue($this->field->checkGoal());
    }
}
