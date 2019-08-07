<?php

namespace DesignPatterns\Behavioral\Interpreter;

/**
 * Expression that evaluates the `doAction` function.
 *
 * It is a `NonTerminalExpression` in terms of the Interpreter pattern. It
 * always calls the `interpret()` method of its subexpressions.
 *
 * @author Vlad Riabchenko <vriabchenko@webnet.fr>
 */
class DoAction implements Expression
{
    /**
     * The subexpression corresponding to the argument of `doAction` function.
     * For example if a sentence contains `doAction('delete')` then the argument
     * is the instance of @see Action expression representing a 'delete' action.
     *
     * @var Action
     */
    private $argument;

    /**
     * @var array
     */
    private $context;

    /**
     * @param Action $argument
     * @param array $context
     */
    public function __construct(Action $argument, array $context)
    {
        $this->argument = $argument;
        $this->context = $context;
    }

    /**
     * Compares the argument given in a sentence and the current action from
     * the external context.
     */
    public function interpret()
    {
        return $this->argument->interpret() === $this->context['current_action'];
    }
}
