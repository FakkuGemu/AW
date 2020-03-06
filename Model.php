<?php
require_once 'DB.php';

abstract class Model
{


    protected function serialize()
    {
        $object = [
            '_id' => new MongoDB\BSON\ObjectId($this->id)
        ];
        return $object;
    }

}