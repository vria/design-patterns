<?php

namespace DesignPatterns\Structural\Decorator;

/**
 * A simple logger that outputs the message passed to it.
 *
 * It corresponds to `ConcreteComponent` in the Decorator pattern.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class Logger implements LoggerInterface
{
    /**
     * @inheritdoc
     */
    public function log($message)
    {
        echo $message;
    }
}
