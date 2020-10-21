<?php
namespace Webdock\Entity;

class ServerUpdateModel extends BaseEntity
{
    public function rules()
    {
        return [
            'name' => ['string'],
            'description' => ['string'],
            'notes' => ['string'],
            'nextActionDate' => ['datetime'],
        ];
    }
}
