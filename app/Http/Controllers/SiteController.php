<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    private $data = [];

    public function index()
    {
        $this->data['products']=Product::select('id','name','image','price')->orderByDesc('id')->get();
        return view('index', $this->data);
    }
}
