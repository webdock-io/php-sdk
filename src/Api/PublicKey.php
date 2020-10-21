<?php
namespace Webdock\Api;
use Webdock\BaseApi;
use Webdock\Entity\PublicKeyCreateModel;

class PublicKey extends BaseApi
{
    protected $endpoint = 'account/publicKeys';
    public function list()
    {
        return $this->execute($this->endpoint, 'GET', []);
    }

    public function create(array $params)
    {
        $model = new PublicKeyCreateModel($params);
        $params = ['form_params' => $model->toArray()];
        return $this->execute($this->endpoint, 'POST', $params);
    }

    public function delete($publicKeyId)
    {
        $endpoint = implode('/', [$this->endpoint, $publicKeyId]);
        return $this->execute($endpoint, 'DELETE', []);
    }
}
