<?php
namespace Webdock\Api;
use Webdock\BaseApi;

class Location extends BaseApi
{
    protected $endpoint = 'locations';
    public function list()
    {
        return $this->execute($this->endpoint, 'GET', []);
    }
}
