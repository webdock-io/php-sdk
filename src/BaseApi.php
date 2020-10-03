<?php
namespace Webdock;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use Webdock\Exception\WebdockException;

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

    protected function getCall($endpoint)
    {
        try {
            $request = $this->client->request('GET', $endpoint);
        } catch (RequestException $e) {
            throw new WebdockException($e->getMessage());
        } finally {
            $this->responseHeaders = $request->getHeaders();
            return json_decode($request->getBody(), true);
        }
    }

    protected function postCall($endpoint, $body)
    {
    }

    protected function patchCall($endpoint)
    {
    }

    protected function deleteCall($endpoint, $body)
    {
    }
}
