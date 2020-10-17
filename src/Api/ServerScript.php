<?php
namespace Webdock\Api;
use Webdock\BaseApi;
use Webdock\Entity\ServerScriptCreateModel;

class ServerScript extends BaseApi
{
    protected $endpoint = 'servers/%s/scripts';
    protected $endpointScriptId = 'servers/%s/scripts/%s';

    public function list($serverSlug)
    {
        $endpoint = sprintf($this->endpoint, $serverSlug);
        return $this->execute($endpoint, 'GET', []);
    }

    public function create($serverSlug, array $params)
    {
        $model = new ServerScriptCreateModel($params);
        $params = ['form_params' => $model->toArray()];
        $endpoint = sprintf($this->endpoint, $serverSlug);

        return $this->execute($endpoint, 'POST', $params);
    }

    public function get($serverSlug, $scriptId)
    {
        $endpoint = sprintf($this->endpointScriptId, $serverSlug, $scriptId);
        return $this->execute($endpoint, 'GET', []);
    }

    public function delete($serverSlug, $scriptId)
    {
        $endpoint = sprintf($this->endpointScriptId, $serverSlug, $scriptId);
        return $this->execute($endpoint, 'DELETE', []);
    }

    public function executeScript($serverSlug, $scriptId)
    {
        $endpoint = implode('/', [
            sprintf($this->endpointScriptId, $serverSlug, $scriptId),
            'execute',
        ]);
        return $this->execute($endpoint, 'POST', []);
    }

    public function fetchFile($serverSlug, $filePath)
    {
        $endpoint = sprintf('servers/%s/fetchFile', $serverSlug);
        $params = ['form_params' => ['filePath' => $filePath]];
        return $this->execute($endpoint, 'POST', $params);
    }
}
