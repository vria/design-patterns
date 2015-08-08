<?php

namespace DesignPatterns\Behavioral\Command\Commands;

use DesignPatterns\Behavioral\Command\Game;

abstract class MoveCommand
{
    /**
     * @var Game
     */
    protected $game;

    /**
     * @param Game $game
     */
    public function __construct(Game $game)
    {
        $this->game = $game;
    }

    public abstract function move();
} 