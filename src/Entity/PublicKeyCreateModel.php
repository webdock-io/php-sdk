<?php
namespace Webdock\Entity;

class PublicKeyCreateModel extends BaseEntity
{
    public function rules(): array
    {
        return [
            'name' => ['string'],
            'publicKey' => ['string'],
        ];
    }
}
