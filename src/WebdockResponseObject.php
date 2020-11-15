<?php
namespace Webdock;
use Psr\Http\Message\ResponseInterface;
use ArrayAccess;
use Iterator;

class WebdockResponseObject
{
    private $headers = null;
    private $response = null;

    public function __construct(ResponseInterface $response)
    {
        $this->headers = new WebdockHeaderObject($response);
        $body = json_decode($response->getBody()->getContents());
        if (is_array($body)) {
            $this->response = new WebdockCollection($body);
        }
        if (is_object($body)) {
            $this->response = new WebdockObject($body);
        }
    }

    public function getHeaders()
    {
        return $this->headers;
    }

    public function getApiStats()
    {
        return [
            'X-RateLimit-Limit' => isset($this->headers['X-RateLimit-Limit'])
                ? $this->headers['X-RateLimit-Limit'][0]
                : null,
            'X-RateLimit-Remaining' => isset(
                $this->headers['X-RateLimit-Remaining']
            )
                ? $this->headers['X-RateLimit-Remaining'][0]
                : null,
            'X-RateLimit-Reset' => isset($this->headers['X-RateLimit-Reset'])
                ? $this->headers['X-RateLimit-Reset'][0]
                : null,
        ];
    }

    public function getCallbackID()
    {
        return isset($this->headers['X-Callback-ID'])
            ? $this->headers['X-Callback-ID'][0]
            : null;
    }

    public function getResponse()
    {
        return $this->response;
    }
}
