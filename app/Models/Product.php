<?php

namespace App\Models;

use App\Traits\GetTableName;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use GetTableName;

    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name', 'description', 'price', 'count', 'aliase', 'user_id'
    ];

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getCount()
    {
        return $this->count;
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function getAliase()
    {
        return $this->aliase;
    }

    public function getDateCreate()
    {
        return $this->created_at;
    }

    public function setName(string $name)
    {
        return $this->name = $name;
    }

    public function setDescription(string $description)
    {
        return $this->description = $description;
    }

    public function setImage(string $image)
    {
        return $this->image = $image;
    }


    public function setPrice(float $price)
    {
        return $this->price = $price;
    }

    public function setCount(int $count)
    {
        return $this->count = $count;
    }

    public function setUserId(int $userId)
    {
        return $this->user_id = $userId;
    }

    public function setAliase()
    {
        $this->aliase = str_slug($this->name);

    }

    public function users()
    {
        return $this->belongsTo('App\User');
    }

    public function uploadImg($image)
    {
        if ($this->image) {
            unlink('storage/' . $this->image);
        }
        $path = $image->store('uploads', 'public');
        $this->image = $path;

    }
//данные пользователя+товара(через товар к пользователю)
    public static function getProductUser(string $aliase)
    {
        return DB::table(self::getTableName().' AS p')
        ->select('u.name AS u_name','u.surname AS u_surname','u.phone AS u_phone','u.email AS u_email','p.id AS p_id',
            'u.id AS u_id','p.name as p_name','p.description AS p_desc',
        'p.updated_at AS p_date','p.image AS p_image','p.count AS p_count','p.price AS p_price')
            ->join(User::getTableName().' AS u','p.user_id','=','u.id')
            ->where('p.aliase',$aliase)
            ->first();
    }
//получить товары покупателя
    public static function getMyBuyProduct(int $id)
    {
        return DB::table(self::getTableName().' AS p')
            ->select('p.aliase AS p_slug','p.name AS p_name','o.total_price AS o_price','o.updated_at AS o_date','o.count AS o_count')
            ->join(Order::getTableName().' AS o','p.id','=','o.product_id')
            ->join(User::getTableName().' AS u','o.user_id','=','u.id')
            ->where('u.id',$id)
            ->get();
    }
//через пользователя к товарам, для товаров на продаже
    public static function getMySaleProducts(int $userId)
    {
        return DB::table(self::getTableName().' AS u')
            ->select('p.name AS p_name','p.count AS p_count','p.price AS p_price')
            ->join(Product::getTableName().' AS p','u.id','=','p.user_id')
            ->where('u.id',$userId)
            ->orderByDesc('p.id')
            ->get();
    }
}
