<?php

namespace DesignPatterns\Structural\Decorator;

/**
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
