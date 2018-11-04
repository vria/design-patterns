<?php

namespace DesignPatterns\Creational\Singleton;

/**
 * Base class for all session classes that are singletons.
 * It is responsible for providing a single instance of currently configured session.
 * Clients should depend on this class to get session object which can be any of Session subclass.
 *
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
     * Private constructor makes impossible to create session objects directly.
     * Subclasses cannot define their own constructor to avoid providing a backdoor in subclasses.
     *
     * @param string $id
     */
    private final function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * @return Session
     */
    public final static function getInstance() {
        if (!self::$instance) {
            // Create the only session object if it is not already exist.
            // Get a FQCN of the session from the environment variable
            // that must be one of the Session subclass and instantiate it.
            $class = getenv('singleton_session_class');
            if (!is_subclass_of($class, Session::class)) {
                throw new \LogicException('singleton_session_class environment variable must be set to the subclass of '.Session::class);
            }

            self::$instance = new $class(uniqid());
        }

        // return the only instance.
        return self::$instance;
    }

    /**
     * @return string
     */
    public function getId()
    {
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
