<?php

namespace DesignPatterns\Behavioral\Command;

/**
 * Interface for commands.
 *
 * It corresponds to `Command` in the Command pattern.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
interface CommandInterface
{
    /**
     * Doing command
     */
    public function move();

    /**
     * Undoing command
     */
    public function moveBack();
}
