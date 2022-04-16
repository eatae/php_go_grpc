<?php

namespace App;

use App\Controller\Controller;
use GuzzleHttp\Psr7\ServerRequest;

class Router
{
    protected string $controllerNamespace = 'App\Controller';
    protected string $controllerPath;
    protected Controller $controller;
    protected string $defaultControllerName = 'AutomobileController';
    protected string $actionPath;
    protected Request $request;

    /**
     * @param Request $request
     * @throws \Exception
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->controller = $this->initController($request);
    }

    /**
     * @param Request $request
     * @return Controller
     * @throws \Exception
     */
    protected function initController(Request $request): Controller
    {
        $class = ( !empty($request->getControllerPath()) )
            ? $this->controllerNamespace.'\\'.ucfirst($request->getControllerPath()) . 'Controller'
            : $this->controllerNamespace.'\\'.$this->defaultControllerName;

        if (!class_exists($class)) {
            throw new \Exception("Controller {$class} not found.");
        }

        return new $class($request);
    }


    


    /**
     * @return Controller
     */
    public function getController(): Controller
    {
        return $this->controller;
    }
    /**
     * @return string
     */
    public function getAction(): string
    {
        return $this->action;
    }
    /**
     * @return Request
     */
    public function getRequest(): Request
    {
        return $this->request;
    }

}