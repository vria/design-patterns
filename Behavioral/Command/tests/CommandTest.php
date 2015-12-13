<?php

namespace DesignPatterns\Structural\Bridge\Tests;

use DesignPatterns\Behavioral\Command\Commands\BottomCommand;
use DesignPatterns\Behavioral\Command\Commands\LeftCommand;
use DesignPatterns\Behavioral\Command\Commands\RightCommand;
use DesignPatterns\Behavioral\Command\Commands\TopCommand;
use DesignPatterns\Behavioral\Command\GameApp;
use DesignPatterns\Behavioral\Command\Point;

class CommandTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GameApp
     */
    private $game;

    protected function setUp()
    {
        $this->game = new GameApp();
        $this->game->newGame(new Point(0, 0), new Point(2, 2));
        $this->game->addKey('left', new LeftCommand($this->game->getField()));
        $this->game->addKey('right', new RightCommand($this->game->getField()));
        $this->game->addKey('top', new TopCommand($this->game->getField()));
        $this->game->addKey('bottom', new BottomCommand($this->game->getField()));
    }

    public function testReachGoal()
    {
        $this->assertFalse($this->game->checkGoal());

        $this->game->pressKey('bottom');
        $this->assertEquals(new Point(0, 1), $this->game->getField()->getPlayer());
        $this->assertFalse($this->game->checkGoal());

        $this->game->pressKey('bottom');
        $this->assertEquals(new Point(0, 2), $this->game->getField()->getPlayer());
        $this->assertFalse($this->game->checkGoal());

        $this->game->pressKey('top');
        $this->assertEquals(new Point(0, 1), $this->game->getField()->getPlayer());
        $this->assertFalse($this->game->checkGoal());

        $this->game->undo();
        $this->assertEquals(new Point(0, 2), $this->game->getField()->getPlayer());
        $this->assertFalse($this->game->checkGoal());

        $this->game->pressKey('right');
        $this->assertEquals(new Point(1, 2), $this->game->getField()->getPlayer());
        $this->assertFalse($this->game->checkGoal());

        $this->game->pressKey('right');
        $this->assertEquals(new Point(2, 2), $this->game->getField()->getPlayer());
        $this->assertTrue($this->game->checkGoal());
    }
}
