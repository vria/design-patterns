<?php

namespace DesignPatterns\Structural\Decorator;

/**
 *
 *
 * Corresponds to `ConcreteComponent` in the Decorator pattern.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class LogMessage implements LogMessageInterface
{
    /**
     * @var string
     */
    private $message;

    /**
     * @param string $message
     */
    public function __construct($message)
    {
        $this->message = $message;
    }

    /**
     * @inheritdoc
     */
    public function log()
    {
        echo $this->message;
    }
}
