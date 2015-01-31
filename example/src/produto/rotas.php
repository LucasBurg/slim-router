<?php

$app->group('/produto',function()use($app){

	$app->get('/',function(){
		echo 'O arquivo de rotas do modulo produto foram carregadas.';
	});

	$app->get('/exportacao',function(){
		echo 'teste produto exportacao';
	});

});