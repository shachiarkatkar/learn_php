<?php
/*include does not hault the process*/
/*#!/usr/bin/env php*/
// application.php

require __DIR__.'/../vendor/autoload.php';
use Symfony\Component\Console\Application as App;
use Migration\Hello as Hello;

$application = new App();

// ... register commands
$application->add(new Hello());/*Creating object of command*/

$application->run();	
?>
