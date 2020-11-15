<?php
namespace Webdock;
use IteratorAggregate;

class WebdockCollection implements IteratorAggregate
{
    protected $items = [];

    public function __construct(array $items)
    {
        foreach ($items as $item) {
            $this->addItem(new WebdockObject($item));
        }
    }

    public function getItem($position)
    {
        if (isset($this->items[$position])) {
            return $this->items[$position];
        }
        return null;
    }

    public function count()
    {
        return count($this->items);
    }

    public function addItem(WebdockObject $item)
    {
        $this->items[] = $item;
    }

    public function toArray()
    {
        return array_map(function ($item) {
            return $item->toArray();
        }, $this->items);
    }

    public function getIterator()
    {
        return new WebdockIterator($this);
    }
}
