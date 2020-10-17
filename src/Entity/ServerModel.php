<?php
namespace Webdock\Entity;

class ServerModel extends BaseEntity
{
    public function rules(): array
    {
        return [
            'name' => ['string'],
            'slug' => ['string'],
            'profileSlug' => ['string'],
            'locationId' => ['string'],
            'imageSlug' => ['string'],
            'snapshotId' => ['string', 'nullable'],
        ];
    }
}
