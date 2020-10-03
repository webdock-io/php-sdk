<?php
namespace Webdock\Entity;
use Webdock\Exception\EntityException;
use GuzzleHttp\Psr7\Response;

class BaseEntity implements EntityInterface
{
    use Validator;
    protected $attributes = [];
    protected $headers = [];

    public function __construct(array $data = null)
    {
        if (is_array($data)) {
            $this->fromArray($data);
        }
    }

    public function fromGuzzle(Response $response)
    {
        $this->attributes = $response->getBody();
        $this->headers = $response->getHeaders();
    }

    public function fromArray(array $data)
    {
        if ($this->validate($data)) {
            $this->attributes = $data;
            return $this;
        }
    }

    public function toArray(): array
    {
        return $this->attributes;
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }
}
