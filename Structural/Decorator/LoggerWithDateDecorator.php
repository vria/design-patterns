<?php

namespace DesignPatterns\Structural\Decorator;

/**
 * Decorator what adds a current date/time to logged message.
 *
 * It corresponds to `ConcreteDecorator` in the Decorator pattern.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class LoggerWithDateDecorator extends LoggerDecorator
{
    /**
     * @var string
     */
    private $format;

    /**
     * @param LoggerInterface $logger
     * @param string $format
     */
    public function __construct(LoggerInterface $logger, $format)
    {
        parent::__construct($logger);

        $this->format = $format;
    }

    /**
     * @inheritdoc
     */
    public function log($message)
    {
        // Output a current date/time before logging the message.
        echo date($this->format) . ": ";

        // Forward log request to the wrapped logger. Note that it can also be a decorated logger.
        parent::log($message);
    }
}
