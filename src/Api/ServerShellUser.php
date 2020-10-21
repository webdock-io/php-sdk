<?php
namespace Webdock\Api;
use Webdock\BaseApi;
use Webdock\Entity\ServerShellUserCreateModel;
use Webdock\Entity\ServerShellUserUpdateModel;

class ServerShellUser extends BaseApi
{
    protected $endpoint = 'servers/%s/shellUsers';

    public function list($serverSlug)
    {
        $endpoint = sprintf($this->endpoint, $serverSlug);
        return $this->execute($endpoint, 'GET', []);
    }

    public function create($serverSlug, array $params)
    {
        $model = new ServerShellUserCreateModel($params);
        $params = ['form_params' => $model->toArray()];
        $endpoint = sprintf($this->endpoint, $serverSlug);
        return $this->execute($endpoint, 'POST', $params);
    }

    public function delete($serverSlug, $shellUserId)
    {
        $endpoint = implode('/', [
            sprintf($this->endpoint, $serverSlug),
            $shellUserId,
        ]);
        return $this->execute($endpoint, 'DELETE', []);
    }

    public function update($serverSlug, $shellUserId, array $params)
    {
        $model = new ServerShellUserUpdateModel($params);
        $params = ['form_params' => $model->toArray()];
        $endpoint = implode('/', [
            sprintf($this->endpoint, $serverSlug),
            $shellUserId,
        ]);
        return $this->execute($endpoint, 'PATCH', $params);
    }
}
