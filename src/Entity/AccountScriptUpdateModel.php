<?php
namespace Webdock\Entity;

class AccountScriptUpdateModel extends BaseEntity
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
