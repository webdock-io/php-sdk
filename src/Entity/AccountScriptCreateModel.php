<?php
namespace Webdock\Entity;

class AccountScriptCreateModel extends BaseEntity
{
    public function rules(): array
    {
        return [
            'name' => ['name'],
            'filename' => ['string'],
            'content' => ['string'],
        ];
    }
}
