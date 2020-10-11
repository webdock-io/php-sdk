<?php
namespace Webdock\Entity;

class AccountScriptCreateModel extends BaseEntity
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
