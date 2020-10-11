<?php
namespace Webdock\Api;
use Webdock\BaseApi;

class Script extends BaseApi
{
    protected $endpoint = 'scripts';
    public function list()
    {
        return $this->execute($this->endpoint, 'GET', []);
    }
}
