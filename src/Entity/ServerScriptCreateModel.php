<?php
namespace Webdock\Entity;

class ServerScriptCreateModel extends BaseEntity
{
    public function rules(): array
    {
        return [
            'scriptId' => ['int64'],
            'path' => ['string'],
            'makeScriptExecutable' => ['boolean', 'default' => false],
            'executeImmediately' => ['boolean', 'default' => false],
        ];
    }
}
