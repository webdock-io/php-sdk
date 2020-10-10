<?php
namespace Webdock;
use Psr\Http\Message\ResponseInterface;
use ArrayAccess;
use Iterator;

class WebdockObject implements ArrayAccess, Iterator
{
    private $headers = [];
    private $container = null;
    private $position = 0;

    public function __construct(ResponseInterface $response)
    {
        $this->container = json_decode(
            $response->getBody()->getContents(),
            true
        );
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

    public function __invoke()
    {
        return $this->container;
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
