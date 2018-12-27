<?php

namespace App\Http\Controllers;


use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ProductController extends Controller
{
    private $data = [];

//добавление товара
    public function addProduct(ProductRequest $request)
    {
//        dd($request);
        $product = new Product();

        $product->fill($request->except(['_token', 'image']));
        if ($request->hasFile('image')) {
            $product->uploadImg($request->file('image'));
        }
        $product->setAliase();
        $product->save();

        return redirect()->back();
    }

//показать один товар
    public function showOne($aliase)
    {
//        $this->data['product'] = Product::select('id', 'name', 'description', 'price', 'count', 'image')->where('aliase', $aliase)->where('count','>',0)->first();
        $this->data['product']=Product::getProductUser($aliase);
        return view('productPage.index', $this->data);
    }
}
