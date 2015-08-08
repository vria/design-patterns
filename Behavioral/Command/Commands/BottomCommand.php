<?php

namespace DesignPatterns\Behavioral\Command\Commands;

class BottomCommand extends MoveCommand
{
    public function move()
    {
        $this->game->player->y--;
    }
} 