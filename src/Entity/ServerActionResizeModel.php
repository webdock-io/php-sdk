<?php
namespace Webdock\Entity;

class ServerActionResizeModel extends BaseEntity
{
    public function rules(): array
    {
        return ['profileSlug' => ['string']];
    }
}
