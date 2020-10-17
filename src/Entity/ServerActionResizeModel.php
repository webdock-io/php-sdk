<?php
namespace Webdock\Entity;

class ServerActionResizeModel extends BaseEntity
{
    public function rules()
    {
        return ['profileSlug' => ['string']];
    }
}
