<?php

namespace DesignPatterns\Structural\Bridge\Tests;

use DesignPatterns\Behavioral\Command\Commands\BottomCommand;
use DesignPatterns\Behavioral\Command\Commands\LeftCommand;
use DesignPatterns\Behavioral\Command\Commands\RightCommand;
use DesignPatterns\Behavioral\Command\Commands\TopCommand;
use DesignPatterns\Behavioral\Command\Game;
use DesignPatterns\Behavioral\Command\Point;

class CommandTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Game
     */
    private $game;

    protected function setUp()
    {
        $this->game = new Game(new Point(0, 0), new Point(2, 2));
        $this->game->addKey('left', new LeftCommand($this->game));
        $this->game->addKey('right', new RightCommand($this->game));
        $this->game->addKey('top', new TopCommand($this->game));
        $this->game->addKey('bottom', new BottomCommand($this->game));
        $this->game->addMenuItem('left', new LeftCommand($this->game));
        $this->game->addMenuItem('right', new RightCommand($this->game));
        $this->game->addMenuItem('bottom', new BottomCommand($this->game));
        $this->game->addMenuItem('top', new TopCommand($this->game));
    }

    public function testPreferKeys()
    {
        $this->assertFalse($this->game->checkGoal());

        // 1:0
        $this->game->pressKey('top');
        $this->assertFalse($this->game->checkGoal());

        // 1:1
        $this->game->pressKey('right');
        $this->assertFalse($this->game->checkGoal());

        // 1:0
        $this->game->pressKey('left');
        $this->assertFalse($this->game->checkGoal());

        // 2:0
        $this->game->pressKey('top');
        $this->assertFalse($this->game->checkGoal());

        // 3:0
        $this->game->pressKey('top');
        $this->assertFalse($this->game->checkGoal());

        // 3:1
        $this->game->pressKey('right');
        $this->assertFalse($this->game->checkGoal());

        // 2:1
        $this->game->pressKey('bottom');
        $this->assertFalse($this->game->checkGoal());

        // 2:2
        $this->game->pressKey('right');
        $this->assertTrue($this->game->checkGoal());
    }

    public function testPreferMenu()
    {
        $this->assertFalse($this->game->checkGoal());

        // 0:1
        $this->game->pressMenuItem('right');
        $this->assertFalse($this->game->checkGoal());

        // 1:1
        $this->game->pressMenuItem('top');
        $this->assertFalse($this->game->checkGoal());

        // 1:0
        $this->game->pressMenuItem('left');
        $this->assertFalse($this->game->checkGoal());

        // 2:0
        $this->game->pressMenuItem('top');
        $this->assertFalse($this->game->checkGoal());

        // 3:0
        $this->game->pressMenuItem('top');
        $this->assertFalse($this->game->checkGoal());

        // 3:1
        $this->game->pressMenuItem('right');
        $this->assertFalse($this->game->checkGoal());

        // 2:1
        $this->game->pressMenuItem('bottom');
        $this->assertFalse($this->game->checkGoal());

        // 2:2
        $this->game->pressMenuItem('right');
        $this->assertTrue($this->game->checkGoal());
    }
}
