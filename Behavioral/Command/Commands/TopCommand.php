<?php

namespace DesignPatterns\Behavioral\Command\Commands;

class TopCommand extends MoveCommand
{
    public function move()
    {
        $this->field->toTop();
    }

    public function moveBack()
    {
        $this->field->toBottom();
    }
}
