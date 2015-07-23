<?php

require '../../vendor/autoload.php';


use DesignPatterns\Structural\Bridge\Equation\LinearEquation;
use DesignPatterns\Structural\Bridge\Equation\QuadraticEquation;
use DesignPatterns\Structural\Bridge\Math\TrivialMathImpl;
use DesignPatterns\Structural\Bridge\Math\GMPMathImpl;


$linearEq = new LinearEquation(2, -20);
$linearEq->setMathImpl(new TrivialMathImpl());
var_dump($linearEq->solve());

$linearEq->setMathImpl(new GMPMathImpl());
var_dump($linearEq->solve());


$quadraticEq = new QuadraticEquation(1, -2, -3);
$quadraticEq->setMathImpl(new TrivialMathImpl());
var_dump($quadraticEq->solve());

$quadraticEq->setMathImpl(new GMPMathImpl());
var_dump($quadraticEq->solve());