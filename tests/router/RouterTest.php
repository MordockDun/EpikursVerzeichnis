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
    /** @var GuzzleHttp\Client */
    private $http;

    public function setUp()
    {
        $this->http = new GuzzleHttp\Client(['base_uri' => "http://localhost/"]);
    }

    public function tearDown()
    {
        $this->http = null;
    }

    /**
     * @covers \EpikursVerzeichnis\router\Router::run
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function testRun()
    {
        $response = $this->http->request(Router::METHOD_GET, "/");
        $this->assertEquals(200, $response->getStatusCode());

        $content = $response->getBody();
        $this->assertEquals("Welcome", $content);
    }

    /**
     * @covers \EpikursVerzeichnis\router\Router::pathNotFound
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function testPathNotFound()
    {
        $response = $this->http->request(Router::METHOD_GET, "/gibtsnicht", ['http_errors' => false]);
        $this->assertEquals(404, $response->getStatusCode());

        $content = $response->getBody();

        echo $content;

        $this->assertEquals("Path '/gibtsnicht' not found",$content);
    }

    /**
     * @covers \EpikursVerzeichnis\router\Router::methodNotAllowed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function testMethodNotAllowed()
    {
        $path = "/";
        $method = Router::METHOD_PUT;

        $response = $this->http->request($method, $path, ['http_errors' => false]);
        $this->assertEquals(405, $response->getStatusCode());

        $content = $response->getBody();
        $this->assertEquals("Method ".$method." not allowed for path ".$path,$content);
    }

}
