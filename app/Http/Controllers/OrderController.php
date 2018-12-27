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
        if ($request->user_id === Auth::id()) {
            return redirect()->back();
        } else {
            $order = new Order();
            $order->setUserId($request->user_id);
            $order->setProductId($request->product_id);
            $order->save();
            $product = Product::where('id', $request->product_id)->first();
            $product->setCount($product->getCount() - 1);
            $product->save();
            return Response::json($product->getCount());
        }

    }
}
