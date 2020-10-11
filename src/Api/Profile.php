<?php
namespace Webdock\Api;
use Webdock\BaseApi;

class Profile extends BaseApi
{
    protected $endpoint = 'profiles';
    public function list(string $locationId)
    {
        $params = ['query' => ['locationId' => $locationId]];
        return $this->execute($this->endpoint, 'GET', $params);
    }
}
