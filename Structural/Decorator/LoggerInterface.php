<?php

namespace DesignPatterns\Structural\Decorator;

/**
 * A contract for all loggers in application. The clients that want to log something depend only on this interface.
 * All loggers and their decorators implement this interface.
 *
 * It corresponds to `Component` in the Decorator pattern.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
interface LoggerInterface
{
    /**
     * @param $message
     *
     * Print log
     */
    public function log($message);
}
