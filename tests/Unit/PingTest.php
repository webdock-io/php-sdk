<?php
namespace Webdock\Tests\Unit;
use PHPUnit\Framework\TestCase;
use Webdock\Client as WebdockClient;
use GuzzleHttp\Psr7\Response;
use Webdock\Tests\Helper;

class PingTest extends TestCase
{
    /**
     * @dataProvider pingResponse
     */
    public function testPing($serverResponse)
    {
        $handler = Helper::createMockHandler([
            new Response(200, [], json_encode($serverResponse)),
        ]);
        $client = new WebdockClient(
            Helper::token(),
            Helper::appName(),
            $handler
        );

        $this->assertSame(
            $serverResponse,
            $client
                ->ping()
                ->getResponse()
                ->toArray()
        );
    }

    public function pingResponse()
    {
        return [[['webdock' => 'rocks']]];
    }
}
