<?php

namespace DesignPatterns\Behavioral\Interpreter\Test;

use DesignPatterns\Behavioral\Interpreter\Action;
use DesignPatterns\Behavioral\Interpreter\Alternation;
use DesignPatterns\Behavioral\Interpreter\DoAction;
use DesignPatterns\Behavioral\Interpreter\InState;
use DesignPatterns\Behavioral\Interpreter\Sequence;
use DesignPatterns\Behavioral\Interpreter\State;
use PHPUnit\Framework\TestCase;

/**
 * @author Vlad Riabchenko <vriabchenko@webnet.fr>
 */
class InterpreterTest extends TestCase
{
    /**
     * `doAction('view')`
     * `doAction('unknown')`
     */
    public function testDoAction()
    {
        $doActionView = new DoAction(
            new Action('view'),          // argument
            ['current_action' => 'view'] // context
        );

        $this->assertTrue($doActionView->interpret());

        $doActionChange = new DoAction(
            new Action('change'),        // argument
            ['current_action' => 'view'] // context
        );

        $this->assertFalse($doActionChange->interpret());

        try {
            new Action('unknown');

            $this->fail('Unknown action throws no exception.');
        } catch (\InvalidArgumentException $e) {
            $this->assertEquals('Unknown action.', $e->getMessage());
        }
    }

    /**
     * `inState('view')`
     * `inState('unknown')`
     */
    public function testInState()
    {
        $inStateProcessing = new InState(
            new State('processing'),          // argument
            ['current_state' => 'processing'] // context
        );

        $this->assertTrue($inStateProcessing->interpret());

        $inStateTreated = new InState(
            new State('treated'),             // argument
            ['current_state' => 'processing'] // context
        );

        $this->assertFalse($inStateTreated->interpret());

        try {
            new State('unknown');

            $this->fail('Unknown state throws no exception.');
        } catch (\InvalidArgumentException $e) {
            $this->assertEquals('Unknown state.', $e->getMessage());
        }
    }

    /**
     * inState('treated') OR inState('rejected')
     */
    public function testAlternation()
    {
        $context = ['current_state' => 'rejected'];
        $a = new Alternation(
            new InState(new State('treated'), $context),
            new InState(new State('rejected'), $context)
        );

        $this->assertTrue($a->interpret());


        $context = ['current_state' => 'processing'];
        $a = new Alternation(
            new InState(new State('treated'), $context),
            new InState(new State('rejected'), $context)
        );

        $this->assertFalse($a->interpret());
    }

    /**
     * doAction('change') AND inState('processing')
     */
    public function testSequence()
    {
        $context = [
            'current_action' => 'change',
            'current_state' => 'processing',
        ];
        $expr = new Sequence(
            new DoAction(new Action('change'), $context),
            new InState(new State('processing'), $context)
        );

        $this->assertTrue($expr->interpret());


        $context = [
            'current_action' => 'delete',
            'current_state' => 'processing',
        ];
        $expr = new Sequence(
            new DoAction(new Action('change'), $context),
            new InState(new State('processing'), $context)
        );

        $this->assertFalse($expr->interpret());
    }

    /**
     * doAction('delete') AND (inState('processing') OR inState('treated'))
     */
    public function testSequenceAlternation()
    {
        $context = [
            'current_action' => 'delete',
            'current_state' => 'processing',
        ];
        $expr = new Sequence(
            new DoAction(new Action('change'), $context),
            new Alternation(
                new InState(new State('processing'), $context),
                new InState(new State('treated'), $context)
            )
        );

        $this->assertFalse($expr->interpret());
    }
}
