<?php

require "../../vendor/autoload.php";

use DesignPatterns\Creational\AbstractFactory\Bootstrap\BootstrapPageFactory;
use DesignPatterns\Creational\AbstractFactory\PlainHTML\PlainPageFactory;


$factory = new BootstrapPageFactory();
//$factory = new PlainPageFactory();

$page = $factory->createPage();
$page->addElement($factory->createTextInput('name', 'Your name'));
$page->addElement($factory->createTextInput('surname', 'Your surname'));
$page->addElement($factory->createButton('Save'));
$page->render();