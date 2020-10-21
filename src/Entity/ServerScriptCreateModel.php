<?php
namespace Webdock\Entity;

class ServerScriptCreateModel extends BaseEntity
{
    public function rules()
    {
        return [
            'scriptId' => ['int64'],
            'path' => ['string'],
            'makeScriptExecutable' => ['boolean', 'default' => false],
            'executeImmediately' => ['boolean', 'default' => false],
        ];
    }
}
