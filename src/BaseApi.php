<?php 
namespace Webdock;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use Webdock\Exception\WebdockException;

abstract class BaseApi implements ApiInterface {
    protected $client; 

    public function __construct(ClientInterface $client) {
        $this->client = $client; 
    }

    protected function getCall($endpoint) {
        try {
            $request = $this->client->request('GET', $endpoint);
        } catch (RequestException $e) {
            throw new WebdockException($e->getMessage());
        } finally {
            return $request->getBody();
        }
    }

    protected function postCall($endpoint, $body) {

    }

    protected function patchCall($endpoint) {

    }

    protected function deleteCall($endpoint, $body) {

    }

}