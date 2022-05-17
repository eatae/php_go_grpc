<?php

namespace App;

use App\EnumValue\RequestMethod;

class Request_v1
{
    protected string        $uri;
    protected string        $path;
    protected string        $controllerPath;
    protected string        $actionPath;
    protected RequestMethod $method;
    protected array         $params;

    /**
     * @param string $uri
     * @param RequestMethod $method
     */
    public function __construct(string $uri, RequestMethod $method)
    {
        $this->uri = $uri;
        $this->method = $method;
        $this->path = trim(parse_url($uri, PHP_URL_PATH));
        $this->controllerPath = $this->receiveControllerPath($this->path);
        $this->actionPath = $this->receiveActionPath($this->path);
        $this->params = $this->parseUriParams($uri);
    }

    /**
     * Parse URI params
     * @param string $uri
     * @return array
     */
    protected function parseUriParams(string $uri): array
    {
        $a = [];
        parse_str(parse_url($uri, PHP_URL_QUERY), $a);
        return $a;
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

    public function getUri(): string
    {
        return $this->uri;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function getControllerPath(): string
    {
        return $this->controllerPath;
    }

    public function getActionPath(): string
    {
        return $this->actionPath;
    }

    public function getMethod(): RequestMethod
    {
        return $this->method;
    }

    public function getParams(): array
    {
        return $this->params;
    }
}
