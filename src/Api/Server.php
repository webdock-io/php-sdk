<?php
namespace Webdock\Api;
use Webdock\BaseApi;
use Webdock\Entity\ServerModel;
use Webdock\Entity\ServerUpdateModel;
use Webdock\Exception\WebdockException;

class Server extends BaseApi
{
    protected $endpoint = 'servers';

    public function list($status = 'all')
    {
        $statuses = ['all', 'suspended', 'active'];
        if (!in_array($status, $statuses)) {
            $error = sprintf(
                'Invalid status parameter, should be: "%s"',
                implode('","', $statuses)
            );
            throw new WebdockException($error);
        }

        $params = ['query' => ['status' => $status]];
        return $this->execute($this->endpoint, 'GET', $params);
    }

    public function create(array $params)
    {
        $model = new ServerModel($params);
        $params = ['form_params' => $model->toArray()];
        return $this->execute($this->endpoint, 'POST', $params);
    }

    public function get($slug)
    {
        $endpoint = sprintf('servers/%s', $slug);
        return $this->execute($endpoint, 'GET', []);
    }
    public function delete($slug)
    {
        $endpoint = sprintf('servers/%s', $slug);
        return $this->execute($endpoint, 'DELETE', []);
    }

    public function update($slug, array $params)
    {
        $endpoint = sprintf('servers/%s', $slug);
        $model = new ServerUpdateModel($params);
        $data = ['form_params' => $model->toArray()];
        return $this->execute($endpoint, 'PATCH', $data);
    }
}
