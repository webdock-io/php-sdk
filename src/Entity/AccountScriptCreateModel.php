<?php
namespace Webdock\Entity;

class AccountScriptCreateModel extends BaseEntity
{
    public function rules(): array
    {
        return [
            'name' => ['string'],
            'filename' => ['string'],
            'content' => ['string'],
        ];
    }
}
