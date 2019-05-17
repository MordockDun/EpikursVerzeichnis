<?php
/**
 * Created by PhpStorm.
 * User: danie
 * Date: 24.10.2018
 * Time: 12:22
 */

use EpikursVerzeichnis\router\Router;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class RouterTest extends TestCase
{
    /**
     * @covers \EpikursVerzeichnis\router\Router::run
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function testRun()
    {
        $mock = new MockHandler([
            new Response(200,[],"Welcome")
        ]);
        $handler = HandlerStack::create($mock);
        $client = new Client(['handler' => $handler]);


        $response = $client->request(Router::METHOD_GET, "/");
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
        $mock = new MockHandler([
            new Response(404,[],"Path '/gibtsnicht' not found")
        ]);
        $handler = HandlerStack::create($mock);
        $client = new Client(['handler' => $handler]);

        $response = $client->request(Router::METHOD_GET, "/gibtsnicht", ['http_errors' => false]);
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



        $mock = new MockHandler([
            new Response(405,[],"Method ".$method." not allowed for path ".$path)
        ]);
        $handler = HandlerStack::create($mock);
        $client = new Client(['handler' => $handler]);


        $response = $client->request($method, $path, ['http_errors' => false]);
        $this->assertEquals(405, $response->getStatusCode());

        $content = $response->getBody();
        $this->assertEquals("Method ".$method." not allowed for path ".$path,$content);
    }

}
