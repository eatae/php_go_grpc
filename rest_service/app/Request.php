<?php

namespace App;

use App\EnumValue\RequestMethod;
use GuzzleHttp\Psr7\ServerRequest;

class Request extends ServerRequest
{

    protected string        $controllerPath;
    protected string        $actionPath;


    public function __construct(string $method, $uri, array $headers = [], $body = null, string $version = '1.1', array $serverParams = [])
    {
        parent::__construct($method, $uri, $headers, $body, $version, $serverParams);

        $this->controllerPath = $this->receiveControllerPath($this->getUri()->getPath());
        $this->actionPath = $this->receiveActionPath($this->getUri()->getPath());
    }

    /**
     * Receive Controller path
     * @param string $path
     * @return string
     */
    protected function receiveControllerPath(string $path): string
    {
        $path = trim($path, '/');

        return explode('/', $path)[0];
    }

    /**
     * Receive Action path
     * @param string $path
     * @return string
     */
    protected function receiveActionPath(string $path): string
    {
        $path = trim($path, '/');
        $exploded = explode('/', $path);

        return $exploded[1] ?? '';
    }

    /**
     * @return string
     */
    public function getControllerPath(): string
    {
        return $this->controllerPath;
    }

    /**
     * @return string
     */
    public function getActionPath(): string
    {
        return $this->actionPath;
    }


}