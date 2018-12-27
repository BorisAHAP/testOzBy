<?php

namespace App\Models;

use App\Traits\GetTableName;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use GetTableName;

    protected $table = 'orders';
    protected $primaryKey = 'id';

    public function getId()
    {
        return $this->id;
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function setName($name)
    {
        return $this->name = $name;
    }

}
