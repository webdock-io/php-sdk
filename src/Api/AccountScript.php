<?php
namespace Webdock\Api;
use Webdock\BaseApi;
use Webdock\Entity\AccountScriptCreateModel;
use Webdock\Entity\AccountScriptUpdateModel;

class AccountScript extends BaseApi
{
    protected $endpoint = 'account/scripts';
    protected $endpointScriptId = 'account/scripts/%s';

    public function list()
    {
        return $this->execute($this->endpoint, 'GET', []);
    }

    public function create(array $params)
    {
        $model = new AccountScriptCreateModel($params);
        $params = ['form_params' => $model->toArray()];
        return $this->execute($this->endpoint, 'POST', $params);
    }

    public function get($scriptId)
    {
        $endpoint = sprintf($this->endpointScriptId, $scriptId);
        return $this->execute($endpoint, 'GET', []);
    }

    public function delete($scriptId)
    {
        $endpoint = sprintf($this->endpointScriptId, $scriptId);
        return $this->execute($endpoint, 'DELETE', []);
    }

    public function update($scriptId, array $params)
    {
        $model = new AccountScriptUpdateModel($params);
        $endpoint = sprintf($this->endpointScriptId, $scriptId);
        $params = ['form_params' => $model->toArray()];
        return $this->execute($endpoint, 'PATCH', $params);
    }
}
