<?php

namespace App;

use App\EnumValue\RequestMethod;

class Request
{
    protected string        $uri;
    protected string        $path;
    protected RequestMethod $method;
    protected array         $params;


    public function __construct(string $uri, RequestMethod $method)
    {
        $this->uri = $uri;
        $this->method = $method;
        $this->path = parse_url($uri, PHP_URL_PATH);
        $this->params = $this->parseUriParams($uri);
    }

    protected function parseUriParams(string $uri): array
    {
        $a = [];
        parse_str(parse_url($uri, PHP_URL_QUERY), $a);
        return $a;
    }

    public function getUri(): string
    {
        return $this->uri;
    }

    public function getPath(): string
    {
        return $this->path;
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