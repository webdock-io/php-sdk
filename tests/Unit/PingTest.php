<?php
namespace Webdock\Tests\Unit;
use PHPUnit\Framework\TestCase;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use Webdock\Client as WebdockClient;
use GuzzleHttp\Psr7\Response;


class PingTest extends TestCase {

    /**
     * @dataProvider pingResponse
     */
    public function testPing($serverResponse)
    {
        $mock = new MockHandler([
            new Response(200, [], json_encode($serverResponse))
        ]);
        $handler = HandlerStack::create($mock);
        $appName = 'MyApplication/1.0';
        $client = new WebdockClient('somerandomtoken', $appName, $handler);

        $this->assertSame($serverResponse, $client->ping()->toArray());
    }

    public function pingResponse()
    {
        return [
            [['webdock'=> 'rocks']]
        ];
    }
    
}