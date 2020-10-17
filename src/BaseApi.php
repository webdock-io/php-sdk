<?php
namespace Webdock;
use GuzzleHttp\ClientInterface;
use Webdock\WebdockObject;

abstract class BaseApi implements ApiInterface
{
    protected $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    protected function execute($endpoint, $method, $params)
    {
        $response = $this->client->request($method, $endpoint, $params);
        return new WebdockObject($response);
    }
}
