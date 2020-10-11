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

    public function start(string $slug)
    {
        $endpoint = sprintf($this->endpoint, $slug, 'start');
        return $this->execute($endpoint, 'POST', []);
    }

    public function stop(string $slug)
    {
        $endpoint = sprintf($this->endpoint, $slug, 'stop');
        return $this->execute($endpoint, 'POST', []);
    }

    public function reboot(string $slug)
    {
        $endpoint = sprintf($this->endpoint, $slug, 'reboot');
        return $this->execute($endpoint, 'POST', []);
    }

    public function suspend(string $slug)
    {
        $endpoint = sprintf($this->endpoint, $slug, 'suspend');
        return $this->execute($endpoint, 'POST', []);
    }

    public function reinstall(string $slug, string $imageSlug)
    {
        $model = new ServerActionReinstallModel(['imageSlug' => $imageSlug]);
        $params = ['form_params' => $model->toArray()];
        $endpoint = sprintf($this->endpoint, $slug, 'reinstall');
        return $this->execute($endpoint, 'POST', $params);
    }

    public function snapshot(string $slug, string $name)
    {
        $model = new ServerActionSnapshotModel(['name' => $name]);
        $params = ['form_params' => $model->toArray()];
        $endpoint = sprintf($this->endpoint, $slug, 'snapshot');
        return $this->execute($endpoint, 'POST', $params);
    }

    public function restore(string $slug, int $snapshotId)
    {
        $model = new ServerActionRestoreSnapshotModel([
            'snapshotId' => $snapshotId,
        ]);
        $params = ['form_params' => $model->toArray()];
        $endpoint = sprintf($this->endpoint, $slug, 'restore');

        return $this->execute($endpoint, 'POST', $params);
    }

    public function resize(string $slug, string $profileSlug)
    {
        $model = new ServerActionResizeModel(['profileSlug' => $profileSlug]);
        $params = ['form_params' => $model->toArray()];
        $endpoint = sprintf($this->endpoint, $slug, 'resize');
        return $this->execute($endpoint, 'POST', $params);
    }

    public function dryRunResize(string $slug, string $profileSlug)
    {
        $model = new ServerActionResizeModel(['profileSlug' => $profileSlug]);
        $params = ['form_params' => $model->toArray()];
        $endpoint = sprintf($this->endpoint, $slug, 'resize/dryrun');
        return $this->execute($endpoint, 'POST', $params);
    }
}
