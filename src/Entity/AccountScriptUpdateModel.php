<?php
namespace Webdock\Entity;

class AccountScriptUpdateModel extends BaseEntity
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
