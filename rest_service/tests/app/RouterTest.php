<?php

namespace Tests\App;

use App\Controller\AutomobileController;
use App\EnumValue\RequestMethod;
use App\RequestV2;
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
        $request = new RequestV2($this->uri, $this->method);

        $sut = new Router($request);

        var_dump($sut);
    }

    public function testConstructor()
    {
        $request = new RequestV2($this->uri, $this->method);
        $sut = new Router($request);

        $this->assertEquals($request, $sut->getRequest());
    }

    /**
     * initController
     */
    public function testInitController()
    {
        $request = new RequestV2($this->method, $this->uri);
        $ctrl = new AutomobileController($request);
        $sut = new Router($request);

        $this->assertEquals($ctrl, $sut->getController());
    }

    /**
     * initController
     */
    public function testInitController_EmptyUri()
    {
        $request = new RequestV2('/', $this->method);
        $ctrl = new AutomobileController();
        $sut = new Router($request);

        $this->assertEquals($ctrl, $sut->getController());
    }

    /**
     * initController
     */
    public function testInitController_NotFoundClass()
    {
        $request = new RequestV2('/foo', $this->method);

        $this->expectException(\Exception::class);
        new Router($request);
    }


}