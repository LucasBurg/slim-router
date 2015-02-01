<?php

require __DIR__ . '/../../vendor/autoload.php';

use Slim\Slim;
use Buum\Router\Router;

$app = new Slim();

$files = (new Router(__DIR__ . '/../src/', 'rotas.php'))->getRoutesFiles();
foreach ($files as $file) include $file;

$app->run();