<?php
namespace Webdock\Entity;

class EventHookCreateModel extends BaseEntity
{
    public function rules()
    {
        return [
            'callbackUrl' => ['string'],
            'callbackId' => ['nullable', 'string'],
            'eventType' => ['nullable', 'string'],
        ];
    }
}
