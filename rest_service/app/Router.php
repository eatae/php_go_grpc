<?php

namespace App;

use App\Controller\Controller;
use Psr\Http\Message\ServerRequestInterface;

class Router
{
    protected string $controllerNamespace = 'App\Controller';
    protected string $defaultControllerName = 'AutomobileController';
    protected PathReceiver $pathReceiver;
    protected ServerRequestInterface $request;
    protected Controller $controller;
    protected string $action;

    /**
     * @throws \Exception
     */
    public function __construct(PathReceiverInterface $pathReceiver)
    {
        $this->pathReceiver = $pathReceiver;
        $this->request = $pathReceiver->getRequest();
        $this->controller = $this->createController($pathReceiver);
        $this->action = $this->createAction($pathReceiver);
    }

    /**
     * Create Controller
     * @throws \Exception
     */
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
     * Create action
     * @throws \Exception]
     */
    protected function createAction(PathReceiver $pathReceiver): string
    {
        $actionName = $this->controller->getActionDefault();

        if (!empty($pathReceiver->getActionPath())) {
            $actionName = 'action'.ucfirst($pathReceiver->getActionPath());
        }
        if (!method_exists($this->controller, $actionName)) {
            throw new \Exception(
                "Controller ". get_class($this->controller)." does not contain ".$actionName." method."
            );
        }

        return $actionName;
    }

    public function getController(): Controller
    {
        return $this->controller;
    }

    public function getAction(): string
    {
        return $this->action;
    }

    public function getRequest(): ServerRequestInterface
    {
        return $this->request;
    }

}