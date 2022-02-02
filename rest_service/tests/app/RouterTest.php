<?php

namespace Tests\App;

use App\EnumValue\RequestMethod;
use App\Request;
use App\Router;
use Tests\PHPUnitUtil;

class RouterTest extends PHPUnitUtil
{
    private string $uri = '/index/index?foo=bar';
    private RequestMethod $method;

    protected function setUp(): void
    {
        $this->method = RequestMethod::byValue('GET');
    }

    /**** TEST ****/
    public function test()
    {

    }

    public function testConstructor()
    {
        $request = new Request($this->uri, $this->method);
        $sut = new Router($request);
        $this->assertEquals($request, $sut->getRequest());


    }

    public function testInitController()
    {

    }

}