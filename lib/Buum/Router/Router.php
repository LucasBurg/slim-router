<?php
namespace Buum\Router;

class Router extends Url
{
	const FILE = 'rotas.php';

	private $url;
	private $pathRoot;

	public function __construct($pathRoot)
	{
		$this->pathRoot = (is_dir($pathRoot))?$pathRoot:false;
	}

	public function setUrl($url)
	{
		$this->url = $url;
	}

	public function getUrl()
	{
		return $this->url;
	}

	public function getPathRoot()
	{
		return $this->pathRoot;
	}

	public function addRotas()
	{
		$arrUrl = $this->getArrayUrl($this->url);
		if($this->pathRoot && is_array($arrUrl)){
			$rota = $this->pathRoot.DIRECTORY_SEPARATOR;
			$files = array();
			foreach ($arrUrl as $k => $path) {
				$rota .= $path.DIRECTORY_SEPARATOR;
				if(file_exists($rota.self::FILE)){
					$files[] = $rota.self::FILE;		
				}
			}
			return $files;
		}
		return false;
	}
}