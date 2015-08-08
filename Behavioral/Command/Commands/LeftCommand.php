<?php

namespace DesignPatterns\Behavioral\Command\Commands;

class LeftCommand extends MoveCommand
{
    public function move()
    {
        $this->game->player->x--;
    }
} 