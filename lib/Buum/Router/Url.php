<?php
namespace Buum\Router;

abstract class Url
{
	const REPLACE = '|';
	const GLUES = array('/');

	protected function cleanUrl($url)
	{
		$padrao = '/(https|http)(:\/\/)/';
		$replace = "";
		$url = preg_replace($padrao, $replace, $url);
		return $url;
	}

	protected function isUrl($url)
	{
		return filter_var($url,FILTER_VALIDATE_URL);
	}

	protected function urlToArray($url, array $search)
	{
		$url = str_replace($search,self::REPLACE,$url);	
		$url = array_filter(explode(self::REPLACE, $url));
		return $url;
	}

	protected function getArrayUrl($url)
	{
		if($this->isUrl($url)){
			$url = $this->cleanUrl($url);
		}		
		$url = $this->urlToArray($url, self::GLUES);
		return $url;
	}

}