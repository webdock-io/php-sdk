<?php
namespace Webdock\Api;
use Webdock\BaseApi;
use Webdock\Entity\EventPollQueryModel;

class EventPoll extends BaseApi
{
    protected $endpoint = 'events';
    public function list(array $params)
    {
        $model = new EventPollQueryModel($params);
        $params = ['query' => $model->toArray()];

        return $this->execute($this->endpoint, 'GET', $params);
    }
}
