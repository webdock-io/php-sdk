<?php
namespace Webdock;
use Webdock\Entity\EntityInterface;

class Collection implements ArrayAccess
{
    protected $items = [];

    public function __construct($items = [])
    {
        $this->items = $this->getValidItems($items);
    }

    protected function getValidItems(array $items)
    {
        $validItems = array_filter($items, function ($element) {
            if ($element instanceof EntityInterface == true) {
                return $element;
            }
        });
        return $validItems;
    }

    public function all()
    {
    }

    public function first()
    {
    }

    public function last()
    {
    }
}
