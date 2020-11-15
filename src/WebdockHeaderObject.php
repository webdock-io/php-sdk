<?php
namespace Webdock;
use Psr\Http\Message\ResponseInterface;
use ArrayAccess;
use Iterator;

class WebdockHeaderObject implements ArrayAccess, Iterator
{
    protected $headers = [];
    private $position = 0;
    public function __construct(ResponseInterface $response)
    {
        $params = $response->getHeaders();
        $this->headers = $params;
    }

    public function __get($name)
    {
        return isset($this->headers[$name]) ? $this->headers[$name] : null;
    }

    public function toArray()
    {
        return $this->headers;
    }
    public function current()
    {
        return $this->headers[$this->position];
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
        return isset($this->headers[$this->position]);
    }
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->headers[] = $value;
        } else {
            $this->headers[$offset] = $value;
        }
    }

    public function offsetExists($offset)
    {
        return isset($this->headers[$offset]);
    }

    public function offsetUnset($offset)
    {
        unset($this->headers[$offset]);
    }

    public function offsetGet($offset)
    {
        return isset($this->headers[$offset]) ? $this->headers[$offset] : null;
    }
}
