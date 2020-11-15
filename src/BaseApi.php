<?php
namespace Webdock;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7;
use Webdock\Exception\WebdockException;
use Webdock\WebdockResponseObject;

abstract class BaseApi implements ApiInterface
{
    protected $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    protected function execute($endpoint, $method, $params)
    {
        try {
            $response = $this->client->request($method, $endpoint, $params);
        } catch (RequestException $e) {
            $errors = [];
            $errors[] = sprintf('Error %s', $e->getCode());
            if ($e->hasResponse()) {
                $errors[] = $e
                    ->getResponse()
                    ->getBody()
                    ->getContents();
            }
            $error = implode("\n", $errors);
            throw new WebdockException($error, $e->getCode());
        }
        return new WebdockResponseObject($response);
    }
}
