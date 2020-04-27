#!/usr/bin/env php
<?php
require __DIR__ . '/../vendor/autoload.php';

use PlayingWithProjections\RunProjection;
use Symfony\Component\Console\Application;

$app = new Application();
$app->add(new RunProjection());
$app->run();
