<?php
namespace Webdock\Entity;

class ServerActionSnapshotModel extends BaseEntity
{
    public function rules(): array
    {
        return [
            'name' => ['string'],
        ];
    }
}
