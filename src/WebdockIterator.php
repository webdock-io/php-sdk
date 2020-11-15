<?php
namespace Webdock;
use Iterator;

class WebdockIterator implements Iterator
{
    protected $collection;
    private $position = 0;

    public function __construct(WebdockCollection $collection)
    {
        $this->collection = $collection;
    }

    public function current()
    {
        return $this->collection->getItem($this->position);
    }

    public function next()
    {
        ++$this->position;
    }

    public function key()
    {
        return $this->position;
    }

    public function valid()
    {
        return !is_null($this->collection->getItem($this->position));
    }

    public function rewind()
    {
        $this->position = 0;
    }
}
