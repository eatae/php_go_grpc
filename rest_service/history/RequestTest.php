<?php

namespace Tests\App;

use App\RequestV2;
use PHPUnit\Framework\TestCase;
use App\EnumValue\RequestMethod;


class RequestTest extends TestCase
{
    protected static RequestMethod $methodGet;

    /**
     *
     */
    public static function setUpBeforeClass(): void
    {
        self::$methodGet = RequestMethod::get(RequestMethod::GET);
    }


    /**
     * Constructor
     */
    public function testConstructor_URLPath()
    {
        $url = "http://localhost:8084/index/index?foo=bar";
        $sut = RequestV2::fromGlobals();

        $this->assertEquals("/index/index", $sut->getUri()->getPath());
    }

    public function testConstructor_URIPath()
    {
        $url = "/index/index?foo=bar";
        $sut = new RequestV2($url, self::$methodGet);

        $this->assertEquals("/index/index", $sut->getPath());
    }

    public function testFoo()
    {
        self::assertEquals('foo', 'foo');
    }

    public function testConstructor_ShortUriPath()
    {
        $url = "/";
        $sut = new RequestV2($url, self::$methodGet);

        $this->assertEquals("/", $sut->getPath());
    }

    /**
     * parseUriParams
     */
    public function testParseUriParams_URI()
    {
        $uri = "/index/index?foo=bar";
        $sut = new RequestV2($uri, self::$methodGet);
        $this->assertEquals( ["foo"=>"bar"], $sut->getParams());
    }

    public function testParseUriParams_URL()
    {
        $url = "http://localhost:8084/index/index?foo=bar";
        $sut = new RequestV2($url, self::$methodGet);
        $this->assertEquals( ["foo"=>"bar"], $sut->getParams());
    }

    public function testParseUriParams_withOutParams()
    {
        $uri = "/index?";
        $sut = new RequestV2($uri, self::$methodGet);
        $this->assertEquals( [], $sut->getParams());
    }

    /**
     * receiveControllerPath
     */
    public function testReceiveControllerPath()
    {
        $uri = "/automobile/index?foo=bar";
        $sut = new RequestV2($uri, self::$methodGet);
        $this->assertEquals( 'automobile', $sut->getControllerPath());
    }

    public function testReceiveControllerPath_Empty()
    {
        $uri = '';
        $sut = new RequestV2($uri, self::$methodGet);
        $this->assertEquals( '', $sut->getControllerPath());
    }

    /**
     * receiveActionPath
     */
    public function testReceiveActionPath()
    {
        $uri = "/automobile/index?foo=bar";
        $sut = new RequestV2($uri, self::$methodGet);
        $this->assertEquals( 'index', $sut->getActionPath());
    }

    public function testReceiveActionPath_Empty()
    {
        $uri = "/automobile";
        $sut = new RequestV2($uri, self::$methodGet);
        $this->assertEquals( '', $sut->getActionPath());
    }



    /**
     * @throws \ReflectionException
     */
//    public function testParseUriParams()
//    {
//        $sut = new Request('/', self::$methodGet);
//        $sutMethod = self::getPrivateMethod($sut, "parseUriParams");
//
//        $uri = "http://localhost:8084/index/index?foo=bar";
//        $this->assertEquals( ["foo"=>"bar"], $sutMethod->invokeArgs(
//            $sut, [$uri]
//        ));
//
//        $uri = "/index/index?foo=bar";
//        $this->assertEquals( ["foo"=>"bar"], $sutMethod->invokeArgs(
//            $sut, [$uri]
//        ));
//
//        $uri = "/index/index";
//        $this->assertEquals([], $sutMethod->invokeArgs(
//            $sut, [$uri]
//        ));
//
//        $uri = "";
//        $this->assertEquals([], $sutMethod->invokeArgs(
//            $sut, [$uri]
//        ));
//    }


}