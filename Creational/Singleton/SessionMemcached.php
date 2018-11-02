<?php

namespace DesignPatterns\Creational\Singleton;

/**
 * @author Vlad Riabchenko <vriabchenko@webnet.fr>
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
