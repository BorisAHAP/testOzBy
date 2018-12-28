<?php

namespace App\Http\Controllers;


use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SiteController extends Controller
{
    private $data = [];

//тут костыль
    public function index(Request $request)
    {
        if ($request->has(2)){
            $this->data['products'] = Product::select('id', 'name', 'image', 'price', 'user_id', 'aliase')->where('count', '>', 0)->orderBy('name')->get();

        }elseif ($request->has(3)){
            $this->data['products'] = Product::select('id', 'name', 'image', 'price', 'user_id', 'aliase')->where('count', '>', 0)->orderBy('price')->get();
        }else{
            $this->data['products'] = Product::select('id', 'name', 'image', 'price', 'user_id', 'aliase')->where('count', '>', 0)->orderByDesc('id')->get();
        }
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
        $this->data['products'] = Product::getMySaleProducts(Auth::id());
        return view('productPage.mySaleProducts', $this->data);
    }

//больше инфо отоваре
    public function moreInfo(int $id)
    {
        $userId = Product::where('id', $id)->first()->getUserId();
        if ($userId != Auth::id()) {
            return redirect(404);
        } else {
            $this->data['info'] = Product::getLastUser($id);
            return view('productPage.moreInfo', $this->data);
        }
    }
}
