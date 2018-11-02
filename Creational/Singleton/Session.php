<?php

namespace DesignPatterns\Creational\Singleton;

/**
 * @author Vlad Riabchenko <vriabchenko@webnet.fr>
 */
abstract class Session
{
    /**
     * @var Session
     */
    private static $instance;

    /**
     * @var string
     */
    private $id;

    /**
     * Private constructor.
     *
     * @param string $id
     */
    private function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * @param string $id
     *
     * @return Session
     */
    public static function getInstance($id) {
        if (!self::$instance) {
            $class = getenv('singleton_session_class');
            if (!is_subclass_of($class, Session::class)) {
                throw new \LogicException('singleton_session_class environment variable must be set to the subclass of '.Session::class);
            }

            self::$instance = new $class($id);
        }

        return self::$instance;
    }

    public function getId() {
        return $this->id;
    }

    /**
     * @return string
     */
    public abstract function read();

    /**
     * @return string
     */
    public abstract function write();
}
