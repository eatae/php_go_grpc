<?php

namespace App;

class Router
{
    protected string $controller;
    protected string $action;
    protected string $requestMethod;
    protected array $params;
    protected array $explodedUri;

    public function __construct(string $uri, string $requestMethod)
    {
        $uriWithoutParams = $this->cleanUri($uri);
        $explodedUri = explode('/', $uriWithoutParams);
        var_dump($uriWithoutParams);
        var_dump($explodedUri);

        if (count($explodedUri) !== 2) {
            throw new \LogicException("Invalid variable value \$explodedUri -> ".gettype($explodedUri));
        }

//        $this->controllerName = ('App\\'.array_shift($explodedUri) == 'App') ?: 'App\\Controller';
//        var_dump($explodedUri);
    }



    protected function cleanUri(string $uri): string
    {
        $uriAndParams = explode('?', trim($uri, "/"));
        return array_shift($uriAndParams);
    }


    protected function collectControllerName()
    {
        if (empty($this->explodedUri) || count($this->explodedUri) !== 2) {
        }
    }




}