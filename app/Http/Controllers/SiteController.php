<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    private $data = [];

    public function index()
    {
        $this->data['products']=Product::select('id','name','image','price','user_id','aliase')->where('count','>',0)->orderByDesc('id')->get();
        return view('index', $this->data);
    }

    public function myBuy()
    {
        $this->data['products']=Product::getMyBuyProduct(Auth::id());
        return view('productPage.myBuyProduct',$this->data);
    }
}
