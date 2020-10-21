<?php
namespace Webdock\Entity;

class EventPollQueryModel extends BaseEntity
{
    public function rules()
    {
        return [
            'callbackId' => ['string', 'nullable'],
            'eventType' => ['string', 'nullable'],
            'page' => ['int64', 'nullable', 'default' => 1],
            'per_page' => ['int64', 'nullable', 'default' => 10],
        ];
    }
}
