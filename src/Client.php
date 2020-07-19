<?php
namespace Webdock;
use Webdock\Exception\WebdockException; 
use GuzzleHttp\Client as GuzzleClient;

final class Client {

    const VERSION = '1.0.0';
    private $client;

    public function __construct($token, callable $handler = null) {
        $config = [
            'base_uri' => 'https://api.webdock.io',
            'headers' => [
                'Authorization' => sprintf('Bearer %s', $token),
                'Accept' => 'application/json'             ]
        ];
        
        if (is_callable($handler)) {
            $config['handler'] = $handler;
        }

        $this->client = new GuzzleClient($config);

    }

    public function __get($service) {
        $className = sprintf('\Webdock\Api\%s', ucfirst($service));
        if (!class_exists($className)) {
            throw new WebdockException(sprintf('Class %s is not exists', $className));
        }

        return new $className($this->client);
    }

    public function ping() {
        return (new \Webdock\Api\Ping($this->client))->ping();
    }

}