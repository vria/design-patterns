<?php

namespace DesignPatterns\Behavioral\Command\Commands;

class RightCommand extends MoveCommand
{
    public function move()
    {
        $this->game->player->x++;
    }
} 