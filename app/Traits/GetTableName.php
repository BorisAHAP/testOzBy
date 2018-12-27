<?php

namespace App\Traits;


trait GetTableName
{
    public static function getTableName()
    {
        return (new self())->getTable();
    }
}