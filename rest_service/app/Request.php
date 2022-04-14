<?php

namespace App;

use App\EnumValue\RequestMethod;
use GuzzleHttp\Psr7\ServerRequest;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\UriInterface;

class Request extends ServerRequest
{
    protected string        $controllerPath;
    protected string        $actionPath;

    /**
     * @param string $method
     * @param $uri
     * @param array $headers
     * @param null $body
     * @param string $version
     * @param array $serverParams
     */
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
     * @param string $path
     */
    public function setControllerPath(string $path): void
    {
        $this->controllerPath = $this->receiveControllerPath($path);
    }

    /**
     * @return string
     */
    public function getActionPath(): string
    {
        return $this->actionPath;
    }

    /**
     * @param string $path
     */
    public function setActionPath(string $path): void
    {
        $this->actionPath = $this->receiveActionPath($path);
    }


}