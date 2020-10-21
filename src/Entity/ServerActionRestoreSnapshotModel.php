<?php
namespace Webdock\Entity;

class ServerActionRestoreSnapshotModel extends BaseEntity
{
    public function rules()
    {
        return ['snapshotId' => ['int64']];
    }
}
