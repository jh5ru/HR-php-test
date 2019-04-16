<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function index($order='asc')
    {
        if(!empty($order)){
           if($order == 'desc'){
               $model = Product::with('vendor')->orderBy('name','desc')->paginate(25)->appends($order);
           }else{
               $model = Product::with('vendor')->orderBy('name','asc')->paginate(25)->appends($order);
           }
        }
        return view('product.index',compact('model'));
    }

    public function save(Request $request, $id){
        if($request->price and is_numeric($request->price)) {
            $model = Product::findOrFail($id);
            $model->price = $request->price;
            $model->save();
            return json_encode(['status' => true, 'price' => number_format($request->price, 2)]);
        }else{
            return json_encode(['status' => false]);
        }
    }

}
