<?php
namespace Webdock\Entity;

class ServerModel extends BaseEntity
{
    public function rules(): array
    {
        return [
            'name' => ['name','alphanum', 'maxLength' => 255, 'minLength' => 4],
            'slug' => ['alphanum', 'maxLength' => 255, 'minLength' => 4],
            'profileSlug' => ['maxLength' => 255, 'minLength' => 4],
            'locationId' => ['maxLength' => 255, 'minLength' => 1],
            'imageSlug' => ['maxLength' => 255, 'minLength' => 1],
            'snapshotId' => [
                'alphanum',
                'nullable',
                'maxLength' => 255,
                'minLength' => 1,
            ],
        ];
    }
}
