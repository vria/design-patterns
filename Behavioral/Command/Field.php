<?php

namespace DesignPatterns\Behavioral\Command;

use DesignPatterns\Behavioral\Command\Command\BottomCommand;
use DesignPatterns\Behavioral\Command\Command\LeftCommand;
use DesignPatterns\Behavioral\Command\Command\RightCommand;
use DesignPatterns\Behavioral\Command\Command\TopCommand;

/**
 * Field holds the current state of a game.
 * When player wants to move it must call one of these operations:
 * - toLeft
 * - toRight
 * - toTop
 * - toBottom
 * Note that the `Receiver` is not coupled with the `Field` and can not call its methods directly.
 *
 * Corresponds to `Receiver` in the Command pattern.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class Field
{
    /**
     * @var Point
     */
    private $player;

    /**
     * @var Point
     */
    private $goal;

    /**
     * Constructor
     *
     * @param Point $player
     * @param Point $goal
     */
    public function __construct(Point $player, Point $goal)
    {
        $this->player = $player;
        $this->goal = $goal;
    }

    /**
     * @return Point
     */
    public function getGoal()
    {
        return $this->goal;
    }

    /**
     * @return Point
     */
    public function getPlayer()
    {
        return $this->player;
    }

    /**
     * @return bool
     */
    public function checkGoal()
    {
        return $this->player->equalTo($this->goal);
    }

    /**
     * Move left
     * @see LeftCommand::move()
     * @see RightCommand::moveBack()
     */
    public function toLeft()
    {
        $this->player->x--;
    }

    /**
     * Move right
     * @see RightCommand::move()
     * @see LeftCommand::moveBack()
     */
    public function toRight()
    {
        $this->player->x++;
    }

    /**
     * Move top
     * @see TopCommand::move()
     * @see BottomCommand::moveBack()
     */
    public function toTop()
    {
        $this->player->y--;
    }

    /**
     * Move bottom
     * @see TopCommand::move()
     * @see BottomCommand::moveBack()
     */
    public function toBottom()
    {
        $this->player->y++;
    }
}
