<?php
namespace Webdock\Entity;

class ServerActionReinstallModel extends BaseEntity
{
    public function rules()
    {
        return [
            'imageSlug' => ['string'],
        ];
    }
}
