<?php

namespace Tests\App;

use App\Request;
use Tests\PHPUnitUtil;
use App\EnumValue\RequestMethod;


class RequestTest extends PHPUnitUtil
{
    protected static RequestMethod $methodGet;

    public static function setUpBeforeClass(): void
    {
        self::$methodGet = RequestMethod::get(RequestMethod::GET);
    }


    /**
     * Constructor
     */
    public function testConstructor_UrlPath()
    {
        $url = "http://localhost:8084/index/index?foo=bar";
        $sut = new Request($url, self::$methodGet);

        $this->assertEquals("/index/index", $sut->getPath());
    }

    public function testConstructor_UriPath()
    {
        $url = "/index/index?foo=bar";
        $sut = new Request($url, self::$methodGet);

        $this->assertEquals("/index/index", $sut->getPath());
    }

    public function testConstructor_ShortUriPath()
    {
        $url = "/";
        $sut = new Request($url, self::$methodGet);

        $this->assertEquals("/", $sut->getPath());
    }


    /**
     * @throws \ReflectionException
     */
    public function testParseUriParams()
    {
        $sut = new Request('/', self::$methodGet);
        $sutMethod = self::getPrivateMethod($sut, "parseUriParams");

        $uri = "http://localhost:8084/index/index?foo=bar";
        $this->assertEquals( ["foo"=>"bar"], $sutMethod->invokeArgs(
            $sut, [$uri]
        ));

        $uri = "/index/index?foo=bar";
        $this->assertEquals( ["foo"=>"bar"], $sutMethod->invokeArgs(
            $sut, [$uri]
        ));

        $uri = "/index/index";
        $this->assertEquals([], $sutMethod->invokeArgs(
            $sut, [$uri]
        ));

        $uri = "";
        $this->assertEquals([], $sutMethod->invokeArgs(
            $sut, [$uri]
        ));
    }

}