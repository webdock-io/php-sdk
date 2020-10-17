<?php
namespace Webdock\Entity;

class ServerActionSnapshotModel extends BaseEntity
{
    public function rules()
    {
        return [
            'name' => ['string'],
        ];
    }
}
