<?php
namespace Webdock\Api;
use Webdock\BaseApi;

class Location extends BaseApi
{
    public function list()
    {
        $endpoint = '/locations';
        $data = $this->getCall($endpoint);
        
    }
}
