<?php
namespace Webdock\Api;
use Webdock\BaseApi;
use Webdock\Exception\WebdockException;
use Webdock\Entity\ServerActionReinstallModel;
use Webdock\Entity\ServerActionSnapshotModel;
use Webdock\Entity\ServerActionRestoreSnapshotModel;
use Webdock\Entity\ServerActionResizeModel;

class ServerAction extends BaseApi
{
    protected $endpoint = 'servers/%s/actions/%s';

    public function start($serverSlug)
    {
        $endpoint = sprintf($this->endpoint, $serverSlug, 'start');
        return $this->execute($endpoint, 'POST', []);
    }

    public function stop($serverSlug)
    {
        $endpoint = sprintf($this->endpoint, $serverSlug, 'stop');
        return $this->execute($endpoint, 'POST', []);
    }

    public function reboot($serverSlug)
    {
        $endpoint = sprintf($this->endpoint, $serverSlug, 'reboot');
        return $this->execute($endpoint, 'POST', []);
    }

    public function suspend($serverSlug)
    {
        $endpoint = sprintf($this->endpoint, $serverSlug, 'suspend');
        return $this->execute($endpoint, 'POST', []);
    }

    public function reinstall($serverSlug, $imageSlug)
    {
        $model = new ServerActionReinstallModel(['imageSlug' => $imageSlug]);
        $params = ['form_params' => $model->toArray()];
        $endpoint = sprintf($this->endpoint, $serverSlug, 'reinstall');
        return $this->execute($endpoint, 'POST', $params);
    }

    public function snapshot($serverSlug, $name)
    {
        $model = new ServerActionSnapshotModel(['name' => $name]);
        $params = ['form_params' => $model->toArray()];
        $endpoint = sprintf($this->endpoint, $serverSlug, 'snapshot');
        return $this->execute($endpoint, 'POST', $params);
    }

    public function restore($serverSlug, $snapshotId)
    {
        $model = new ServerActionRestoreSnapshotModel([
            'snapshotId' => $snapshotId,
        ]);
        $params = ['form_params' => $model->toArray()];
        $endpoint = sprintf($this->endpoint, $serverSlug, 'restore');

        return $this->execute($endpoint, 'POST', $params);
    }

    public function resize($serverSlug, $profileSlug)
    {
        $model = new ServerActionResizeModel(['profileSlug' => $profileSlug]);
        $params = ['form_params' => $model->toArray()];
        $endpoint = sprintf($this->endpoint, $serverSlug, 'resize');
        return $this->execute($endpoint, 'POST', $params);
    }

    public function dryRunResize($serverSlug, $profileSlug)
    {
        $model = new ServerActionResizeModel(['profileSlug' => $profileSlug]);
        $params = ['form_params' => $model->toArray()];
        $endpoint = sprintf($this->endpoint, $serverSlug, 'resize/dryrun');
        return $this->execute($endpoint, 'POST', $params);
    }
}
