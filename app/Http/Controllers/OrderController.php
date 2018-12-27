<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;


class OrderController extends Controller
{
    private $data = [];

    public function buyProduct(Request $request)
    {
        if ($request->ajax()) {
            if ($request->user_id === Auth::id()) {
                return redirect()->back();
            } else {
                $order=Order::firstornew([
                    'user_id'=>$request->user_id,
                    'product_id'=>$request->product_id
                ]);
                $order->count++;
                $order->total_price=$order->count*$request->price;
                $order->save();
                $product = Product::where('id', $request->product_id)->first();
                $product->setCount($product->getCount() - 1);
                $product->save();
                return Response::json($product->getCount());
            }
        }
    }
}
