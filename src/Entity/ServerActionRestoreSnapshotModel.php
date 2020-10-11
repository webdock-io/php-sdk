<?php
namespace Webdock\Entity;

class ServerActionRestoreSnapshotModel extends BaseEntity
{
    public function rules(): array
    {
        return ['snapshotId' => ['int64']];
    }
}
