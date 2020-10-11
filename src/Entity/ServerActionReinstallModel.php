<?php
namespace Webdock\Entity;

class ServerActionReinstallModel extends BaseEntity
{
    public function rules(): array
    {
        return [
            'imageSlug' => ['string'],
        ];
    }
}
