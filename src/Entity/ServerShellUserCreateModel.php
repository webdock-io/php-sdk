<?php
namespace Webdock\Entity;
class ServerShellUserCreateModel extends BaseEntity
{
    public function rules(): array
    {
        return [
            'username' => ['shell_username'],
            'password' => ['shell_password'],
            'group' => ['string', 'default' => 'sudo'],
            'shell' => ['string', 'default' => '/bin/bash'],
            'publicKeys' => ['arrayOfString'],
        ];
    }
}
