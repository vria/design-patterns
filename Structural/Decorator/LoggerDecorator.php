<?php

namespace DesignPatterns\Structural\Decorator;

/**
 * Abstract decorator of logger object that provides a default implementation of @see LoggerDecorator::log().
 *
 * It corresponds to `Decorator` in the Decorator pattern.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class LoggerDecorator implements LoggerInterface
{
    /**
     * @var LoggerInterface
     */
    protected $decoratedLogger;

    /**
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->decoratedLogger = $logger;
    }

    /**
     * @inheritdoc
     */
    public function log($message)
    {
        $this->decoratedLogger->log($message);
    }
}
