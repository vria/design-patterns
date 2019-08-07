<?php

namespace DesignPatterns\Behavioral\Interpreter;

/**
 * The expression that evaluates boolean `AND` operator in a sentence.
 *
 * It is a `NonTerminalExpression` in terms of the Interpreter pattern. It
 * always calls the `interpret()` method of its subexpressions.
 *
 * @author Vlad Riabchenko <vriabchenko@webnet.fr>
 */
class Sequence implements Expression
{
    /**
     * The first required operand.
     *
     * @var Expression
     */
    private $seq1;

    /**
     * The second required operand.
     *
     * @var Expression
     */
    private $seq2;

    /**
     * @param Expression $seq1
     * @param Expression $seq2
     */
    public function __construct(Expression $seq1, Expression $seq2)
    {
        $this->seq1 = $seq1;
        $this->seq2 = $seq2;
    }

    /**
     * Joins the subexpressions with boolean `AND` operator.
     */
    public function interpret()
    {
        return $this->seq1->interpret() && $this->seq2->interpret();
    }
}
