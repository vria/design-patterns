<?php

require '../../vendor/autoload.php';


use DesignPatterns\Structural\Bridge\Equation\LinearEquation;
use DesignPatterns\Structural\Bridge\Equation\QuadraticEquation;
use DesignPatterns\Structural\Bridge\Math\TrivialMathImpl;
use DesignPatterns\Structural\Bridge\Math\GMPMathImpl;

echo "\n==== 2*x - 20 = 0 ====\n";
$linearEq = new LinearEquation(2, -20);

echo "\nTrivial:\n";
$linearEq->setMathImpl(new TrivialMathImpl());
var_dump($linearEq->solve());

echo "\nGMP:\n";
$linearEq->setMathImpl(new GMPMathImpl());
var_dump($linearEq->solve());


echo "\n==== x^2 - 2x - 3 = 0 ====\n";
$quadraticEq = new QuadraticEquation(1, -2, -3);

echo "\nTrivial:\n";
$quadraticEq->setMathImpl(new TrivialMathImpl());
var_dump($quadraticEq->solve());

echo "\nGMP:\n";
$quadraticEq->setMathImpl(new GMPMathImpl());
var_dump($quadraticEq->solve());