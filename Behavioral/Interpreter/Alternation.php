<?php

namespace DesignPatterns\Behavioral\Interpreter;

/**
 * The expression that evaluates boolean `OR` operator in a sentence.
 *
 * It is a `NonTerminalExpression` in terms of the Interpreter pattern. It
 * always calls the `interpret()` method of its subexpressions.
 *
 * @author Vlad Riabchenko <vriabchenko@webnet.fr>
 */
class Alternation implements Expression
{
    /**
     * The first alternative expression.
     *
     * @var Expression
     */
    private $alt1;

    /**
     * The second alternative expression.
     *
     * @var Expression
     */
    private $alt2;

    /**
     * @param Expression $alt1
     * @param Expression $alt2
     */
    public function __construct(Expression $alt1, Expression $alt2)
    {
        $this->alt1 = $alt1;
        $this->alt2 = $alt2;
    }

    /**
     * Joins the subexpressions with boolean `OR` operator.
     */
    public function interpret()
    {
        return $this->alt1->interpret() || $this->alt2->interpret();
    }
}
