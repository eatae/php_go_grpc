<?php

namespace Tests\App;

use App\Controller\AutomobileController;
use App\EnumValue\RequestMethod;
use App\Request;
use App\Router;
use Tests\PHPUnitUtil;

class RouterTest extends PHPUnitUtil
{
    private string $uri = '/automobile/index?foo=bar';
    private RequestMethod $method;

    protected function setUp(): void
    {
        $this->method = RequestMethod::byValue('GET');
    }

    /**** TEST ****/
    public function test()
    {
        $request = new Request($this->uri, $this->method);

        $sut = new Router($request);

        var_dump($sut);
    }

    public function testConstructor()
    {
        $request = new Request($this->uri, $this->method);
        $sut = new Router($request);

        $this->assertEquals($request, $sut->getRequest());
    }

    /*
     * testInitController
     */
    public function testInitController()
    {
        $request = new Request($this->method, $this->uri);
        $ctrl = new AutomobileController($request);
        $sut = new Router($request);

        $this->assertEquals($ctrl, $sut->getController());
    }

    public function testInitController_EmptyUri()
    {
        $request = new Request('/', $this->method);
        $ctrl = new AutomobileController();
        $sut = new Router($request);

        $this->assertEquals($ctrl, $sut->getController());
    }

    public function testInitController_NotFoundClass()
    {
        $request = new Request('/foo', $this->method);

        $this->expectException(\Exception::class);
        new Router($request);
    }


}