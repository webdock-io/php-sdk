<?php
namespace Webdock\Entity;

class Server extends BaseEntity
{
    public function rules(): array
    {
        return [
            'name' => ['alphanum', 'maxLength' => 255, 'minLength' => 4],
            'slug' => ['alphanum', 'maxLength' => 255, 'minLength' => 4],
            'profileSlug' => ['alphanum', 'maxLength' => 255, 'minLength' => 4],
            'locationId' => ['alphanum', 'maxLength' => 255, 'minLength' => 1],
            'imageSlug' => ['alphanum', 'maxLength' => 255, 'minLength' => 1],
            'snapshotId' => [
                'alphanum',
                'nullable',
                'maxLength' => 255,
                'minLength' => 1,
            ],
        ];
    }
    
    // protected function format(): array
    // {
    //     return [
    //         'slug' => ['alphanum'],
    //         'name' => ['alphanum'],
    //         'location' => ['nullable', 'alphanum'],
    //         'image' => ['alphanum'],
    //         'profile' => ['nullable', 'alphanum'],
    //         'ipv4' => ['nullable', 'ipv4'],
    //         'ipv6' => ['nullable', 'ipv6'],
    //         'status' => [
    //             'enum' => [
    //                 'provisioning',
    //                 'running',
    //                 'stopped',
    //                 'error',
    //                 'rebooting',
    //                 'starting',
    //                 'stopping',
    //                 'reinstalling',
    //             ],
    //         ],
    //         'webServer' => ['alphanum'],
    //         'aliases' => ['nullable', 'arrayOfString'],
    //         'snapshotRunTime' => ['int64'],
    //         'description' => ['alphanum'],
    //         'wordPressLockDown' => ['boolean', 'default' => false],
    //         'notes' => ['alphanum'],
    //         'date' => ['datetime'],
    //         'nextActionDate' => ['nullable', 'datetime'],
    //     ];
    // }
}
