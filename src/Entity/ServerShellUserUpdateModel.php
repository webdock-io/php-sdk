<?php
namespace Webdock\Entity;
class ServerShellUserUpdateModel extends BaseEntity
{
    public function rules()
    {
        return [
            'publicKeys' => ['arrayOfInt'],
        ];
    }
}
