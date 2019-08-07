<?php

namespace DesignPatterns\Behavioral\Interpreter;

/**
 * Represents an action which corresponds to either of these values: `view`,
 * `change`, `delete`.
 *
 * `TerminalExpression` in terms of the Interpreter pattern.
 *
 * @author Vlad Riabchenko <vriabchenko@webnet.fr>
 */
class Action implements Expression
{
    /**
     * `view`, `change`, `delete`.
     *
     * @var string
     */
    private $action;

    /**
     * @param string $action
     */
    public function __construct($action)
    {
        if (!in_array($action, ['view', 'change', 'delete'])) {
            throw new \InvalidArgumentException('Unknown action.');
        }

        $this->action = $action;
    }

    /**
     * @inheritdoc
     */
    public function interpret()
    {
        return $this->action;
    }
}
