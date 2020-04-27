#!/usr/bin/env php
<?php

use PlayingWithProjections\RunProjection;
use Symfony\Component\Console\Application as ApplicationAlias;

require __DIR__.'/../vendor/autoload.php';

$application = new ApplicationAlias();
$application->add(new RunProjection());
$application->run();
