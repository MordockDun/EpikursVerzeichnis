<?php
/**
 * Created by PhpStorm.
 * User: danie
 * Date: 24.10.2018
 * Time: 12:22
 */

use EpikursVerzeichnis\router\Router;
use PHPUnit\Framework\TestCase;

class RouterTest extends TestCase
{
    private $http;

    public function setUp()
    {
        $this->http = new GuzzleHttp\Client(['base_uri' => "http://localhost/"]);
    }

    public function tearDown()
    {
        $this->http = null;
    }

    public function testRun()
    {

        $response = $this->http->request('GET', "/");
        $this->assertEquals(200, $response->getStatusCode());

        $content = $response->getBody();
        $this->assertEquals("Welcome", $content);
    }

    public function test404()
    {
        $response = $this->http->request("get", "/gibtsnicht", ['http_errors' => false]);

        $this->assertEquals(404, $response->getStatusCode());
    }

    public function test405()
    {
        $response = $this->http->request("put", "/", ['http_errors' => false]);

        $this->assertEquals(405, $response->getStatusCode());
    }
}
