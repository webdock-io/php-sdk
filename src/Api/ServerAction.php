<?php
namespace Webdock\Api;
use Webdock\BaseApi;
use Webdock\Exception\WebdockException;
use Webdock\WebdockObject;
class ServerAction extends BaseApi
{
    protected $endpoint = 'servers/%s/actions/%s';

    public function start(string $slug)
    {
        $endpoint = sprintf($this->endpoint, $slug, 'start');
        $response = $this->execute($endpoint, 'POST', []);
        return new WebdockObject($response);
    }

    public function actionStop(string $slug)
    {
    }

    public function actionReboot(string $slug)
    {
    }

    public function actionSuspend(string $slug)
    {
    }

    public function actionReinstall(string $slug)
    {
    }

    public function actionSnapshot(string $slug)
    {
    }

    public function actionRestore(string $slug)
    {
    }

    public function actionResize(string $slug, $dryRun = false)
    {
    }

    public function shelluserList(string $slug)
    {
    }

    public function createShellUser(string $slug)
    {
    }

    public function deleteShellUser(string $slug, integer $shellUserId)
    {
    }

    public function updateShellUser(string $slug, integer $shellUserId)
    {
    }
}
