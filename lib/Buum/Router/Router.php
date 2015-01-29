<?php
namespace Buum\Router;

class Router extends Url
{
	const FILE = 'rotas.php';

	private $url;
	private $pathRoot;
	private $pathApplication;

	public function __construct($pathApplication)
	{
		$this->pathApplication = (is_dir($pathApplication))?$pathApplication:false;
	}

	public function setUrl($url)
	{
		$this->url = $url;
	}

	public function setPathRoot($pathRoot)
	{
		$this->pathRoot = $pathRoot;
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
		$keyPathRoot = array_search($this->pathRoot, $arrUrl);
		if($keyPathRoot){
			unset($arrUrl[$keyPathRoot]);
		}
		if($this->pathApplication && is_array($arrUrl)){
			$rota = $this->pathApplication.DIRECTORY_SEPARATOR;
			$files = array();
			if(empty($arrUrl)){
				$files[] = $rota.self::FILE;
			} else {
				foreach ($arrUrl as $k => $path) {
					$rota .= $path.DIRECTORY_SEPARATOR;
					if(file_exists($rota.self::FILE)){
						$files[] = $rota.self::FILE;		
					}
				}
			}
			return $files;
		}
		return false;
	}
}