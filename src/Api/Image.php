<?php
namespace Webdock\Api;
use Webdock\BaseApi;

class Image extends BaseApi
{
    protected $endpoint = 'images';
    public function list()
    {
        return $this->execute($this->endpoint, 'GET', []);
    }
}
