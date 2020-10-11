<?php
namespace Webdock\Entity;

class EventHookCreateModel extends BaseEntity
{
    public function rules(): array
    {
        return [
            'callbackUrl' => ['string'],
            'callbackId' => ['nullable', 'string'],
            'eventType' => ['nullable', 'string'],
        ];
    }
}
