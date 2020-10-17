<?php
namespace Webdock\Entity;
class ServerShellUserCreateModel extends BaseEntity
{
    public function rules(): array
    {
        return [
            'username' => ['string'],
            'password' => ['string'],
            'group' => ['string', 'default' => 'sudo'],
            'shell' => ['string', 'default' => '/bin/bash'],
            'publicKeys' => ['arrayOfInt'],
        ];
    }
}
