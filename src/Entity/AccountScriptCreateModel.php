<?php
namespace Webdock\Entity;

class AccountScriptCreateModel extends BaseEntity
{
    public function rules()
    {
        return [
            'name' => ['string'],
            'filename' => ['string'],
            'content' => ['string'],
        ];
    }
}
