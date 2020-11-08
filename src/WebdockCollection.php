<?php
namespace webdock;

class WebdockCollection implements \IteratorAggregate
{
    private $items = [];

    public function __construction($items = [])
    {
        $this->items = $items;
    }

    public function getItems()
    {
        return $this->items;
    }

    public function addItem($item)
    {
        $this->items[] = $item;
    }

    public function getIterator()
    {
        return new \ArrayIterator($this);
    }
}
