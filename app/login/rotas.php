<?php
$app->group('/login',function()use($app){

	$app->get('/',function(){
		echo 'O arquivo de rotas do modulo login foram carregadas.';
	});

});