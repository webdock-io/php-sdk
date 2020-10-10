<?php
namespace Webdock\Entity;

class ServerUpdateModel extends BaseEntity
{
    public function rules(): array
    {
        return [
            'name' => [
                'name',
                'alphanum',
                'maxLength' => 255,
                'minLength' => 4,
            ],
            'description' => ['name', 'maxLength' => 255, 'minLength' => 4],
            'notes' => ['name', 'maxLength' => 255, 'minLength' => 4],
            'nextActionDate' => ['datetime'],
        ];
    }
}
