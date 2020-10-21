<?php
namespace Webdock\Api;
use Webdock\BaseApi;

class ServerMetric extends BaseApi
{
    protected $endpoint = 'servers/%s/metrics';

    public function getMetrics($serverSlug)
    {
        $endpoint = sprintf($this->endpoint, $serverSlug);
        return $this->execute($endpoint, 'GET', []);
    }

    public function getMetricsNow($serverSlug)
    {
        $endpoint = implode('/', [
            sprintf($this->endpoint, $serverSlug),
            'now',
        ]);
        return $this->execute($endpoint, 'GET', []);
    }
}
