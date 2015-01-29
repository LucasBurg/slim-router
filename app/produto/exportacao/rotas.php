<?php
$app->group('/produto/exportacao',function()use($app){

	$app->get('/:nome',function($nome){
		echo 'teste rotas exportacao '.$nome;
	});

});