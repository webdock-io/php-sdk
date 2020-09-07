<?php
namespace Webdock\Entity;

interface EntityInterface extends ArrayAccess
{
    protected function validate();

    protected function rules(); 

    public function toArray();

    public function fromArray(array $array);

}
