<?php
namespace Webdock\Entity;

class ServerUpdateModel extends BaseEntity
{
    public function rules(): array
    {
        return [
            'name' => ['string'],
            'description' => ['string'],
            'notes' => ['string'],
            'nextActionDate' => ['datetime'],
        ];
    }
}
