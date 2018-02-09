<?php

namespace DesignPatterns\Behavioral\Command;

/**
 * Interface for generic command
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
interface Command
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
