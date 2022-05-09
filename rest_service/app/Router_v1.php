<?php

namespace App;

use App\Controller\Controller;
use GuzzleHttp\Psr7\ServerRequest;

class Router_v1
{
    protected string $controllerNamespace = 'App\Controller';
    protected string $controllerPath;
    protected Controller $controller;
    protected string $defaultControllerName = 'AutomobileController';
    protected string $actionPath;
    protected RequestV2 $request;

    /**
     * @param RequestV2 $request
     * @throws \Exception
     */
    public function __construct(ServerRequest $request)
    {
        $this->request = $request;
        $this->controller = $this->initController($request);
    }

    /**
     * @param RequestV2 $request
     * @return Controller
     * @throws \Exception
     */
    protected function initController(RequestV2 $request): Controller
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
     * @return RequestV2
     */
    public function getRequest(): RequestV2
    {
        return $this->request;
    }

}