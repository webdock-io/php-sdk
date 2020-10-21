<?php
namespace Webdock\Api;
use Webdock\BaseApi;
use Webdock\Entity\EventHookCreateModel;

class EventHook extends BaseApi
{
    protected $endpoint = 'hooks';

    public function list()
    {
        return $this->execute($this->endpoint, 'GET', []);
    }

    public function create(array $params)
    {
        $model = new EventHookCreateModel($params);
        $params = ['form_params' => $model->toArray()];
        return $this->execute($this->endpoint, 'POST', $params);
    }

    public function get($hookId)
    {
        $endpoint = implode('/', [$this->endpoint, $hookId]);
        return $this->execute($endpoint, 'GET', []);
    }

    public function delete($hookId)
    {
        $endpoint = implode('/', [$this->endpoint, $hookId]);
        return $this->execute($endpoint, 'DELETE', []);
    }
}
