<?php

namespace App\Models;

use App\Traits\GetTableName;
use Illuminate\Database\Eloquent\Model;

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

    public function setPrice(int $price)
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

}
