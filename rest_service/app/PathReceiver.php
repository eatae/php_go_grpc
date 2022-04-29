<?php

namespace App;

use Psr\Http\Message\ServerRequestInterface;

class PathReceiver implements PathReceiverInterface
{
    protected ServerRequestInterface $request;
    protected string $controllerPath;
    protected string $actionPath;

    public function __construct(ServerRequestInterface $request)
    {
        $this->request = $request;
        $this->controllerPath = $this->receiveControllerPath($request);
        $this->actionPath = $this->receiveActionPath($request);
    }

    /**
     * Receive Controller path
     */
    protected function receiveControllerPath(ServerRequestInterface $request): string
    {
        $path = trim($request->getUri()->getPath(), '/');

        return explode('/', $path)[0];
    }

    /**
     * Receive Action path
     */
    protected function receiveActionPath(ServerRequestInterface $request): string
    {
        $path = trim($request->getUri()->getPath(), '/');
        $exploded = explode('/', $path);

        return $exploded[1] ?? '';
    }

    public function getControllerPath(): string
    {
        return $this->controllerPath;
    }

    public function getActionPath(): string
    {
        return $this->actionPath;
    }

    public function getRequest(): ServerRequestInterface
    {
        return $this->request;
    }
}