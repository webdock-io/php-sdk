<?php
namespace Webdock\Entity;

class Server extends BaseEntity
{
    protected function rules(): array
    {
        return [
            'slug' => ['alphanum'],
            'name' => ['alphanum'],
            'location' => ['nullable', 'alphanum'],
            'image' => ['alphanum'],
            'profile' => ['nullable', 'alphanum'],
            'ipv4' => ['nullable', 'ipv4'],
            'ipv6' => ['nullable', 'ipv6'],
            'status' => [
                'enum' => [
                    'provisioning',
                    'running',
                    'stopped',
                    'error',
                    'rebooting',
                    'starting',
                    'stopping',
                    'reinstalling',
                ],
            ],
            'webServer' => ['alphanum'],
            'aliases' => ['nullable', 'arrayOfString'],
            'snapshotRunTime' => ['int64'],
            'description' => ['alphanum'],
            'wordPressLockDown' => ['boolean', 'default' => false],
            'notes' => ['alphanum'],
            'date' => ['datetime'],
            'nextActionDate' => ['nullable', 'datetime'],
        ];
    }
}
