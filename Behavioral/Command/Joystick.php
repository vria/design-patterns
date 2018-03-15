<?php

namespace DesignPatterns\Behavioral\Command;

/**
 * Joystick represents a manipulator with few keys. When key is pressed on joystick the method of `Field` must be called.
 * This class is completely decoupled from `Field` and it has no means to call its methods directly.
 * Instead the joystick calls the appropriate methods of `Field` by means of `Command` objects.
 *
 * Corresponds to `Invoker` in the Command pattern.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class Joystick
{
    /**
     * Available keys.
     * Array that maps string requests "left", "right", etc. to commands LestCommand, RightCommand, etc.
     *
     * @var CommandInterface[]
     */
    private $keyboard = [];

    /**
     * Command history
     *
     * @var array
     */
    private $requests = [];

    /**
     * Add a new key to the joystick
     *
     * @param $key
     * @param CommandInterface $command
     */
    public function addKey($key, CommandInterface $command)
    {
        $this->keyboard[$key] = $command;
    }

    /**
     * Press key, execute command
     *
     * @param string $key
     */
    public function pressKey($key)
    {
        $this->requests[] = $key; // Save the request to history
        $this->keyboard[$key]->move(); // Execute command
    }

    /**
     * Undo last move
     */
    public function undo()
    {
        $lastRequest = array_pop($this->requests); // get last key pressed, delete it from history of requests

        $this->keyboard[$lastRequest]->moveBack(); // Undo command
    }
}
