<?php
namespace Webdock\Entity;
class ServerShellUserCreateModel extends BaseEntity
{
    public function rules()
    {
        return [
            'username' => ['string'],
            'password' => ['string'],
            'group' => ['string', 'default' => 'sudo'],
            'shell' => ['string', 'default' => '/bin/bash'],
            'publicKeys' => ['nullable','arrayOfInt'],
        ];
    }
}
