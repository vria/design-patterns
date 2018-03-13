<?php

namespace DesignPatterns\Structural\Decorator;

/**
 *
 *
 * Corresponds to `ConcreteDecorator` in the Decorator pattern.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class LogMessageWithErrorLevelDecorator extends LogMessageDecorator
{
    const ERROR = "#ff0000";
    const WARNING = "#ffbb00";
    const INFO = "#0000ff";

    /**
     * @var string
     */
    private $errorLevel;

    /**
     * @param LogMessageInterface $message
     * @param string $errorLevel
     */
    public function __construct(LogMessageInterface $message, $errorLevel = self::INFO)
    {
        parent::__construct($message);

        $this->errorLevel = $errorLevel;
    }

    /**
     * @inheritdoc
     */
    public function log()
    {
        echo "<span style='color: {$this->errorLevel}'>";

        parent::log();

        echo "</span>";
    }
}
