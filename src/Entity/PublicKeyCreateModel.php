<?php
namespace Webdock\Entity;

class PublicKeyCreateModel extends BaseEntity
{
    public function rules()
    {
        return [
            'name' => ['string'],
            'publicKey' => ['string'],
        ];
    }
}
