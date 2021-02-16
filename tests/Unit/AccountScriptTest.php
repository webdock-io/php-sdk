<?php
namespace Webdock\Tests\Unit;
use PHPUnit\Framework\TestCase;
use Webdock\Client as WebdockClient;
use GuzzleHttp\Psr7\Response;
use Webdock\Tests\Helper;

/**
 *
 * @testdox Account Script Features
 *
 */
class AccountScriptTest extends TestCase
{
    /**
     *
     * @dataProvider accountScriptGetResponse
     */
    public function testAccountScriptGet($serverResponse)
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
            $client->accountScript
                ->list()
                ->getResponse()
                ->toArray()
        );
    }

    /**
     *
     * @dataProvider accountScriptListResponse
     */
    public function testAccountScriptList($serverResponse)
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
            $client->accountScript
                ->list()
                ->getResponse()
                ->toArray()
        );
    }

    /**
     *
     * @dataProvider accountScriptCreateResponse
     */
    public function testAccountScriptCreate($serverResponse)
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
            $client->accountScript
                ->list()
                ->getResponse()
                ->toArray()
        );
    }

    /**
     *
     * @dataProvider accountScriptUpdateResponse
     */
    public function testAccountScriptUpdate($serverResponse)
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
            $client->accountScript
                ->list()
                ->getResponse()
                ->toArray()
        );
    }

    /**
     *
     * @dataProvider accountScriptDeleteResponse
     */
    public function testAccountScriptDelete($serverResponse)
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
            $client->accountScript
                ->list()
                ->getResponse()
                ->toArray()
        );
    }

    public function accountScriptDeleteResponse()
    {
        return [
            [
                [
                    'id' => 2500,
                    'name' => 'Download Concrete5',
                    'description' => 'description',
                    'filename' => 'downloadconcrete.sh',
                    'content' => '#!/bin/bash',
                ],
                [
                    'id' => 2600,
                    'name' => 'Enable MongoDB',
                    'description' => 'description',
                    'filename' => 'enable-mongodb.sh',
                    'content' => '#!/bin/bash',
                ],
            ],
        ];
    }

    public function accountScriptUpdateResponse()
    {
        return [
            [
                [
                    'id' => 2500,
                    'name' => 'Download Concrete5',
                    'description' => 'description',
                    'filename' => 'downloadconcrete.sh',
                    'content' => '#!/bin/bash',
                ],
                [
                    'id' => 2600,
                    'name' => 'Enable MongoDB',
                    'description' => 'description',
                    'filename' => 'enable-mongodb.sh',
                    'content' => '#!/bin/bash',
                ],
            ],
        ];
    }

    public function accountScriptCreateResponse()
    {
        return [
            [
                [
                    'id' => 2500,
                    'name' => 'Download Concrete5',
                    'description' => 'description',
                    'filename' => 'downloadconcrete.sh',
                    'content' => '#!/bin/bash',
                ],
                [
                    'id' => 2600,
                    'name' => 'Enable MongoDB',
                    'description' => 'description',
                    'filename' => 'enable-mongodb.sh',
                    'content' => '#!/bin/bash',
                ],
            ],
        ];
    }
    public function accountScriptListResponse()
    {
        return [
            [
                [
                    'id' => 2500,
                    'name' => 'Download Concrete5',
                    'description' => 'description',
                    'filename' => 'downloadconcrete.sh',
                    'content' => '#!/bin/bash',
                ],
                [
                    'id' => 2600,
                    'name' => 'Enable MongoDB',
                    'description' => 'description',
                    'filename' => 'enable-mongodb.sh',
                    'content' => '#!/bin/bash',
                ],
            ],
        ];
    }
    public function accountScriptGetResponse()
    {
        return [
            [
                [
                    'id' => 2500,
                    'name' => 'Download Concrete5',
                    'description' => 'description',
                    'filename' => 'downloadconcrete.sh',
                    'content' => '#!/bin/bash',
                ],
                [
                    'id' => 2600,
                    'name' => 'Enable MongoDB',
                    'description' => 'description',
                    'filename' => 'enable-mongodb.sh',
                    'content' => '#!/bin/bash',
                ],
            ],
        ];
    }
}
