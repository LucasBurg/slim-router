<?php
/**
 * @author Lucas Burg
 */

require 'lib/Slim/Slim.php';
require 'lib/Buum/Router/Url.php';
require 'lib/Buum/Router/Router.php';

use Slim\Slim;
use Buum\Router\Router;

Slim::registerAutoloader();

$app = new Slim();

//pode utilizar o método do slim ou da variavel $_SERVER
$url = $app->request->getResourceUri();

$url = $_SERVER['REQUEST_URI'];

//instancia e informa o path dos modulos
$router = new Router('app');

//caso tenho um path root, pode informalo
$router->setPathRoot('slim-router');

$router->setUrl($url);

$rotas = $router->addRotas();	

if($rotas){
	foreach ($rotas as $k => $rota) {
		echo $rota.'<hr>';
		include $rota;
	}
} else {
	echo 'url indefinida';
}

$app->run();