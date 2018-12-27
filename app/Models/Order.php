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

    public function getProductId()
    {
        return $this->product_id;
    }

    public function getDateOrder()
    {
        return $this->created_at;
    }

    public function setUserId(int $userId)
    {
        return $this->user_id = $userId;
    }

    public function setProductId(int $productId)
    {
        return $this->product_id = $productId;
    }
}
