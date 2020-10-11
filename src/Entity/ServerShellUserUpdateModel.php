<?php
namespace Webdock\Entity;
class ServerShellUserUpdateModel extends BaseEntity
{
    public function rules(): array
    {
        return [
            'publicKeys' => ['arrayOfString'],
        ];
    }
}
