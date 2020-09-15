<?php
namespace Webdock\Entity;

class Ping extends BaseEntity
{
    protected function rules(): array
    {
        return [
            'webdock' => 'string'
        ]
    }
}

