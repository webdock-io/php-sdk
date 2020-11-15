<?php
namespace Webdock;

class WebdockObject
{
    protected $properties = [];

    public function __construct(object $item)
    {
        $data = get_object_vars($item);
        foreach ($data as $key => $value) {
            $this->properties[$key] = $value;
        }
    }
    public function __get($name)
    {
        if (array_key_exists($name, $this->properties)) {
            return $this->properties[$name];
        }
        return null;
    }

    public function toArray()
    {
        return $this->properties;
    }
}
