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
    
    
}
