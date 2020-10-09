<?php
namespace Webdock;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use Webdock\Exception\WebdockException;
use Webdock\Entity\EntityInterface;

abstract class BaseApi implements ApiInterface
{
    protected $client;
    protected $responseHeaders = [];

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    public function getHeaders()
    {
        return $this->responseHeaders;
    }

    protected function execute($endpoint, $method, EntityInterface $model)
    {
        $response = $this->client->request(
            $method,
            $endpoint,
            $model->toArray()
        );

        return $model::normalize($response);
    }
    
}
