<?php
namespace Webdock\Entity;

class AccountScriptUpdateModel extends BaseEntity
{
    public function rules(): array
    {
        return [
            'name' => ['alphanum'],
            'filename' => ['string'],
            'content' => ['string'],
        ];
    }
}
