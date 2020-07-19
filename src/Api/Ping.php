<?php
namespace Webdock\Api;
use Webdock\BaseApi; 

class Ping extends BaseApi {

    public function ping() {
        return $this->getCall('/ping');
    }

}