<?php

namespace DesignPatterns\Creational\Singleton;

/**
 * Session implementation that stores data in file.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class SessionFile extends Session
{
    /**
     * @inheritdoc
     */
    public function read()
    {
        return 'SessionFile reads from file "'.$this->getId().'"';
    }

    /**
     * @inheritdoc
     */
    public function write()
    {
        return 'SessionFile writes to file "'.$this->getId().'"';
    }
}
