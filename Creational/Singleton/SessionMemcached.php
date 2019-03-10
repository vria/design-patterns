<?php

namespace DesignPatterns\Creational\Singleton;

/**
 * Session implementation that stores data in Memcached.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class SessionMemcached extends Session
{
    /**
     * @inheritdoc
     */
    public function read()
    {
        return 'SessionMemcached reads from memcached key "'.$this->getId().'"';
    }

    /**
     * @inheritdoc
     */
    public function write()
    {
        return 'SessionMemcached writes to memcached key "'.$this->getId().'"';
    }
}
