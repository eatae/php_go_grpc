<?php

namespace App;

use App\Controller\Controller;
use Psr\Http\Message\ServerRequestInterface;

class Router
{
    protected string $controllerNamespace = 'App\Controller';
    protected Controller $controller;
    protected string $defaultControllerName = 'AutomobileController';
    protected ServerRequestInterface $request;

    public function __construct(PathReceiverInterface $pathReceiver)
    {
        $this->request = $pathReceiver->getRequest();
        $this->controller = $this->createController($pathReceiver);
    }

    protected function createController(PathReceiverInterface $pathReceiver): Controller
    {
        $class = ( !empty($pathReceiver->getControllerPath()) )
            ? $this->controllerNamespace.'\\'.ucfirst($pathReceiver->getControllerPath()) . 'Controller'
            : $this->controllerNamespace.'\\'.$this->defaultControllerName;

        if (!class_exists($class)) {
            throw new \Exception("Controller {$class} not found.");
        }

        return new $class($pathReceiver->getRequest());
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