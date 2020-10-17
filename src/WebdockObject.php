<?php
namespace Webdock;
use Psr\Http\Message\ResponseInterface;
use ArrayAccess;
use Iterator;

class WebdockObject implements ArrayAccess, Iterator
{
    private $headers = [];
    private $container = null;
    private $response = null;
    private $position = 0;

    public function __construct(ResponseInterface $response)
    {
        $this->response = json_decode($response->getBody()->getContents());
        $this->container = json_decode(json_encode($this->response), true);
        $this->headers = $response->getHeaders();
    }

    public function current()
    {
        return $this->container[$this->position];
    }

    public function rewind()
    {
        $this->position = 0;
    }

    public function key()
    {
        return $this->position;
    }

    public function next()
    {
        ++$this->position;
    }

    public function valid()
    {
        return isset($this->container[$this->position]);
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

    public function toArray()
    {
        return $this->container;
    }

    public function getResponse()
    {
        return $this->response;
    }

    public function __invoke()
    {
        return $this->toArray();
    }

    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    public function offsetGet($offset)
    {
        return isset($this->container[$offset])
            ? $this->container[$offset]
            : null;
    }
}
