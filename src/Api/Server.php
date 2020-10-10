<?php
namespace Webdock\Api;
use Webdock\BaseApi;
use Webdock\Entity\ServerModel;
use Webdock\Entity\ServerUpdateModel;
use Webdock\Exception\WebdockException;
use Webdock\WebdockObject;

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
        $response = $this->execute($this->endpoint, 'GET', $params);
        return new WebdockObject($response);
    }

    public function create(array $params)
    {
        $model = new ServerModel($params);
        $params = ['form_params' => $model->toArray()];
        $response = $this->execute($this->endpoint, 'POST', $params);
        return new WebdockObject($response);
    }

    public function get(string $slug)
    {
        $endpoint = sprintf('servers/%s', $slug);
        $response = $this->execute($endpoint, 'GET', []);
        return new WebdockObject($response);
    }
    public function delete(string $slug)
    {
        $endpoint = sprintf('servers/%s', $slug);
        $response = $this->execute($endpoint, 'DELETE', []);
        return new WebdockObject($response);
    }

    public function update(string $slug, array $params)
    {
        $endpoint = sprintf('servers/%s', $slug);
        $model = new ServerUpdateModel($params);
        $data = ['form_params' => $model->toArray()];
        $response = $this->execute($endpoint, 'PATCH', $data);
        return new WebdockObject($response);
    }
}
