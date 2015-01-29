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

$url = $app->request->getResourceUri();

$router = new Router('app');

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