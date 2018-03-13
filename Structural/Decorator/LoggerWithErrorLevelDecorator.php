<?php

namespace DesignPatterns\Structural\Decorator;

/**
 * Decorator what allows for error level colored logs.
 *
 * It corresponds to `ConcreteDecorator` in the Decorator pattern.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class LoggerWithErrorLevelDecorator extends LoggerDecorator
{
    const ERROR   = "#ff0000";
    const WARNING = "#ffbb00";
    const INFO    = "#0000ff";

    /**
     * @var string
     */
    private $errorLevel;

    /**
     * @param LoggerInterface $logger
     * @param string $errorLevel
     */
    public function __construct(LoggerInterface $logger, $errorLevel = self::INFO)
    {
        parent::__construct($logger);

        $this->errorLevel = $errorLevel;
    }

    /**
     * @inheritdoc
     */
    public function log($message)
    {
        echo "<span style='color: {$this->errorLevel}'>";

        parent::log($message);

        echo "</span>";
    }
}
