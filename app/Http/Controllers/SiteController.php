<?php

namespace App\Http\Controllers;


use App\Models\Product;
use App\User;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    private $data = [];

    public function index()
    {
        $this->data['products'] = Product::select('id', 'name', 'image', 'price', 'user_id', 'aliase')->where('count', '>', 0)->orderByDesc('id')->get();
        return view('index', $this->data);
    }

//товары купленные клиентом
    public function myBuy()
    {
        $this->data['products'] = Product::getMyBuyProduct(Auth::id());
        return view('productPage.myBuyProduct', $this->data);
    }

//товары клиента
    public function mySale()
    {
        $this->data['products']=Product::getMySaleProducts(Auth::id());
        return view('productPage.mySaleProducts', $this->data);
    }
}
