<?php

namespace App\Http\Controllers;

use App\Product;


class ProductController extends Controller
{
    public function index()
    {
        $model = Product::paginate(25);
        return view('product.index',compact('model'));
    }

}
