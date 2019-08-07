<?php

namespace DesignPatterns\Behavioral\Interpreter;

/**
 * Expression that evaluates the `inState` function.
 *
 * It is a `NonTerminalExpression` in terms of the Interpreter pattern. It
 * always calls the `interpret()` method of its subexpressions.
 *
 * @author Vlad Riabchenko <vriabchenko@webnet.fr>
 */
class InState implements Expression
{
    /**
     * The subexpression corresponding to the argument of `inState` function.
     * For example if a sentence contains `inState('view')` then the argument
     * is the instance of @see State expression representing a 'view' state.
     *
     * @var State
     */
    private $argument;

    /**
     * External context in which the expression is evaluated.
     *
     * @var array
     */
    private $context;

    /**
     * @param State $argument
     * @param array $context
     */
    public function __construct(State $argument, array $context)
    {
        $this->argument = $argument;
        $this->context = $context;
    }

    /**
     * Compares the argument given in a sentence and the current state from
     * the external context.
     */
    public function interpret()
    {
        return $this->argument->interpret() === $this->context['current_state'];
    }
}
