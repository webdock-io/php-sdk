<?php
namespace Webdock\Entity;
use Webdock\Exception\EntityException;

class BaseEntity implements EntityInterface
{
    use Validator;
    protected $attributes = [];

    public function __construct(array $data = null)
    {
        if (is_array($data)) {
            $this->fromArray($data);
        }
    }

    public function fromArray(array $data)
    {
        if ($this->validate($data)) {
            $this->attributes = $data;
            return $this;
        }
    }
}
