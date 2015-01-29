<?php
$app->group('/produto/exportacao',function()use($app){

	$app->get('/',function(){
		echo 'O arquivo de rotas do modulo produto/exportacao foram carregadas.';
	});

});