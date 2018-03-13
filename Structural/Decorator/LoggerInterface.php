<?php

namespace DesignPatterns\Structural\Decorator;

/**
 *
 *
 * Corresponds to `Component` in the Decorator pattern.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
interface LogMessageInterface
{
    /**
     * Print log
     */
    public function log();
}
