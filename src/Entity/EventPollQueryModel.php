<?php
namespace Webdock\Entity;

class EventPollQueryModel extends BaseEntity
{
    public function rules(): array
    {
        return [
            'callbackId' => ['string'],
            'eventType' => ['string'],
            'page' => ['int64', 'default' => 1],
            'per_page' => ['int64', 'default' => 10],
        ];
    }
}
