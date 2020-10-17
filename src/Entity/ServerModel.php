<?php
namespace Webdock\Entity;

class ServerModel extends BaseEntity
{
    public function rules(): array
    {
        return [
            'name' => ['name', 'maxLength' => 255, 'minLength' => 4],
            'slug' => ['name', 'maxLength' => 255, 'minLength' => 4],
            'profileSlug' => ['maxLength' => 255, 'minLength' => 4],
            'locationId' => ['maxLength' => 255, 'minLength' => 1],
            'imageSlug' => ['maxLength' => 255, 'minLength' => 1],
            'snapshotId' => [
                'name',
                'nullable',
                'maxLength' => 255,
                'minLength' => 1,
            ],
        ];
    }
}
