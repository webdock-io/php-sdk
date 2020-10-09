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

    public static function normalize(Response $response, $isSingle = true)
    {
        $data = json_decode($response->json(), true);
        if ($isSingle == true) {
            return new static($data);
        }

        return array_map(function ($i) {
            return new static($i);
        }, $data);
    }
}
