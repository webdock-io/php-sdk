<?php
namespace Webdock\Entity;

class ServerModel extends BaseEntity
{
    public function rules()
    {
        return [
            'name' => ['string'],
            'slug' => ['string'],
            'profileSlug' => ['string'],
            'locationId' => ['string'],
            'imageSlug' => ['nullable','string'],
            'snapshotId' => ['nullable','string'],
        ];
    }
}
