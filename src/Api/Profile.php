<?php
namespace Webdock\Api;
use Webdock\BaseApi;

class Profile extends BaseApi
{
    protected $endpoint = 'profiles';
    public function list($locationId)
    {
        $params = ['query' => ['locationId' => $locationId]];
        return $this->execute($this->endpoint, 'GET', $params);
    }
}
