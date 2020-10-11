<?php
namespace Webdock;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use Webdock\Exception\WebdockException;
use Webdock\Entity\EntityInterface;
use Webdock\WebdockObject;

abstract class BaseApi implements ApiInterface
{
    protected $client;
    protected static $apiStats = null;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    public function getStats()
    {
        return $self->apiStats;
    }

    protected function execute($endpoint, $method, $params)
    {
        $response = $this->client->request($method, $endpoint, $params);
        return new WebdockObject($response);
    }
}
