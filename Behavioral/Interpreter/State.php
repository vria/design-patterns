<?php

namespace DesignPatterns\Behavioral\Interpreter;

/**
 * Represents a state which corresponds to either of these values:
 * `processing`, `treated`, `rejected`.
 *
 * `TerminalExpression` in terms of the Interpreter pattern.
 *
 * @author Vlad Riabchenko <vriabchenko@webnet.fr>
 */
class State implements Expression
{
    /**
     * `processing`, `treated`, `rejected`.
     *
     * @var string
     */
    private $state;

    /**
     * @param string $state
     */
    public function __construct($state)
    {
        if (!in_array($state, ['processing', 'treated', 'rejected'])) {
            throw new \InvalidArgumentException('Unknown state.');
        }

        $this->state = $state;
    }

    /**
     * Evaluates to its state.
     */
    public function interpret()
    {
        return $this->state;
    }
}
