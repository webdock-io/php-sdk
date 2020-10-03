<?php
namespace Webdock\Api;
use Webdock\BaseApi;
use Webdock\Entity\Server as ServerEntity; 
class Server extends BaseApi
{
    public function list()
    {
    }

    public function create(array $params)
    {
      $model = new ServerEntity($params);
      
    }

    public function get(string $slug)
    {
    }
    public function delete(string $slug)
    {
    }

    public function update(string $slug)
    {
    }

    public function actionStart(string $slug)
    {
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

    public function actionResize(string $slug, boolean $dryRun = false)
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
