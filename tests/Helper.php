<?php
namespace Webdock\Tests;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;

class Helper
{
    public static function appName()
    {
        return 'MyApplication/1.0';
    }

    public static function token()
    {
        return 'some random token';
    }

    public static function createMockHandler(array $responseStack)
    {
        $mock = new MockHandler($responseStack);
        return HandlerStack::create($mock);
    }
}
