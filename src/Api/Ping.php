<?php
namespace Webdock\Api;
use Webdock\BaseApi;

class Ping extends BaseApi
{
    protected $endpoint = 'ping';
    public function ping()
    {
        return $this->execute($this->endpoint, 'GET', []);
    }
}
