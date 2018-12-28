<?php

namespace App\Http\Controllers;


use App\Http\Requests\ChangeProductRequest;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;


class ProductController extends Controller
{
    private $data = [];

//добавление товара
    public function addProduct(ProductRequest $request)
    {
        if (strlen($request->description) > 65000) {
            return redirect()->back()->with('alert', 'Описание превышает 65кб');
        } else {
            $product = new Product();

            $product->fill($request->except(['_token', 'image']));
            if ($request->hasFile('image')) {
                $product->uploadImg($request->file('image'));
            }
            $product->setAliase();
            $product->save();

            return redirect()->back();
        }

    }

//показать один товар
    public function showOne(string $aliase)
    {
        $this->data['product'] = Product::getProductUser($aliase);
        return view('productPage.index', $this->data);
    }

//отображение редактируемого товара
    public function edit(int $id)
    {
        $this->data['product'] = Product::select('id', 'name', 'user_id', 'description', 'count', 'price', 'image')->where('id', $id)->first();
        if ($this->data['product']->getUserId() != Auth::id()) {
            return redirect(404);
        } else {
            return view('productPage.myProduct', $this->data);
        }
    }

    //сохранение изменений
    public function update(ChangeProductRequest $request, int $id)
    {
        if ($request->post()) {
            $this->data['product'] = Product::where('id', $id)->first();
            if ($request->hasFile('image')) {
                $this->data['product']->uploadImg($request->file('image'));
            }
            $this->data['product']->fill($request->except('_token'));
            $this->data['product']->setAliase();
            $this->data['product']->save();
        }
        return redirect()->route('home');
    }
}
