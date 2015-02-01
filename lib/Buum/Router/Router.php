<?php

namespace Buum\Router;

class Router
{
    /**
     * @var string
     */
    private $routesPath;

    /**
     * @var string
     */
    private $routeFilename;

    /**
     * @param string $routesPath
     * @param string $routeFilename
     */
    public function __construct($routesPath, $routeFilename)
    {
        $this->routesPath = $routesPath;
        $this->routeFilename = $routeFilename;
    }

    /**
     * @return array
     */
    public function getRoutesFiles()
    {
        $files = [];
        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($this->routesPath),
            \RecursiveIteratorIterator::SELF_FIRST
        );

        foreach ($iterator as $fileInfo) {
            if ($fileInfo->isFile() && $fileInfo->getFilename() == $this->routeFilename) {
                $files[] = $fileInfo->getPathname();
            }
        }

        return $files;
    }
}