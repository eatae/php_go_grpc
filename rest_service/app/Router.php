<?php

namespace App;

class Router
{
    protected string $controllerName;
    protected string $actionName;
    protected string $requestMethod;
    protected string $params;

    public function __construct(string $uri, string $requestMethod)
    {
        $uriWithOutParams = $this->cleanUri($uri);



//        $explodedUri = explode('/', $uri);
//        $this->controllerName = ('App\\'.array_shift($explodedUri) == 'App') ?: 'App\\Controller';
//        var_dump($explodedUri);
    }



    protected function cleanUri(string $uri): string
    {
        $uriAndParams = explode('?', trim($uri, "/"));
        return array_shift($uriAndParams);
    }


    public function receiveControllerName(string $uri)
    {
        if (true) {

        }
    }


}