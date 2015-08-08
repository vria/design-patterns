<?php

namespace DesignPatterns\Behavioral\Command\Commands;

class TopCommand extends MoveCommand
{
    public function move()
    {
        $this->game->player->y++;
    }
} 