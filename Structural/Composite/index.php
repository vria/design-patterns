<?php

require '../../vendor/autoload.php';

use DesignPatterns\Structural\Composite\Form;
use DesignPatterns\Structural\Composite\TextWidget;
use DesignPatterns\Structural\Composite\SubmitWidget;

$form = new Form('myform');
$form->add(new TextWidget('name'));
$form->add(new TextWidget('surname'));
$form->add(new SubmitWidget('submit'));
$form->render();