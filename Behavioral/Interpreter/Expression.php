<?php

namespace DesignPatterns\Behavioral\Interpreter;

/**
 * Defines a common interface for all grammar rules.
 * Also all nodes in an AST (abstract syntax tree) implement this interface.
 * An AST represents a particular sentence in a language defined by grammar
 * rules.
 *
 * It is an `AbstractExpression` in terms of the Interpreter pattern.
 *
 * @author Vlad Riabchenko <vriabchenko@webnet.fr>
 */
interface Expression
{
    /**
     * Evaluates an expression:
     * - subclasses of `TerminalExpression` type return a value immediately,
     * - subclasses of `NonTerminalExpression` type call `interpret` methods of
     *   theirs subexpressions.
     *
     * @return mixed
     */
    public function interpret();
}
