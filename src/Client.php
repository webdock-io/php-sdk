<?php
namespace Webdock;
use Webdock\Exception\WebdockException;
use GuzzleHttp\Client as GuzzleClient;

final class Client
{
    const VERSION = 'v1.0.0';
    private $client;

    public function __construct($token, $appName = '', callable $handler = null)
    {
        $xClient = sprintf('webdock-php-sdk/%s', self::VERSION);
        $config = [
            'base_uri' => 'https://api.webdock.io/v1/',
            'headers' => [
                'Authorization' => sprintf('Bearer %s', $token),
                'Accept' => 'application/json',
                'X-Client' => $xClient,
                'X-Application' => $appName,
            ],
        ];

        if (is_callable($handler)) {
            $config['handler'] = $handler;
        }

        $this->client = new GuzzleClient($config);
    }

    public function __get($service)
    {
        $className = sprintf('\Webdock\Api\%s', ucfirst($service));
        if (!class_exists($className)) {
            throw new WebdockException(
                sprintf('API Method %s does not exist', $className)
            );
        }

        return new $className($this->client);
    }

    public function ping()
    {
        return (new \Webdock\Api\Ping($this->client))->ping();
    }
}
