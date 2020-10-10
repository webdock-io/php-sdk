<?php
namespace Webdock;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use Webdock\Exception\WebdockException;
use Webdock\Entity\EntityInterface;

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
        return $this->client->request($method, $endpoint, $params);
    }
}
