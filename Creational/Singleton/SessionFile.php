<?php

namespace DesignPatterns\Creational\Singleton;

/**
 * @author Vlad Riabchenko <vriabchenko@webnet.fr>
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
