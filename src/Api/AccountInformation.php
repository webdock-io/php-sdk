<?php
namespace Webdock\Api;
use Webdock\BaseApi;

class AccountInformation extends BaseApi
{
    protected $endpoint = 'account/accountInformation';
    public function get()
    {
        return $this->execute($this->endpoint, 'GET', []);
    }
}
