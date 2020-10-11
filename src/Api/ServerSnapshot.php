<?php
namespace Webdock\Api;
use Webdock\BaseApi;

class ServerSnapshot extends BaseApi
{
    protected $endpoint = 'servers/%s/snapshots';

    public function list(string $serverSlug)
    {
        $endpoint = sprintf($this->endpoint, $serverSlug);
        return $this->execute($endpoint, 'GET', []);
    }

    public function get(string $serverSlug, int $snapshotId)
    {
        $endpoint = implode('/', [
            sprintf($this->endpoint, $serverSlug),
            $snapshotId,
        ]);
        return $this->execute($endpoint, 'GET', []);
    }

    public function delete(string $serverSlug, int $snapshotId)
    {
        $endpoint = implode('/', [
            sprintf($this->endpoint, $serverSlug),
            $snapshotId,
        ]);
        return $this->execute($endpoint, 'DELETE', []);
    }
}
