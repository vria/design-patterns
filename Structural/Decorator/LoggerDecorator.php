<?php

namespace DesignPatterns\Structural\Decorator;

/**
 *
 *
 * Corresponds to `Decorator` in the Decorator pattern.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class LogMessageDecorator implements LogMessageInterface
{
    /**
     * @var LogMessageInterface
     */
    protected $message;

    /**
     * @param LogMessageInterface $message
     */
    public function __construct(LogMessageInterface $message)
    {
        $this->message = $message;
    }

    /**
     * @inheritdoc
     */
    public function log()
    {
        $this->message->log();
    }
}
