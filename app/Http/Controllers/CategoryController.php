<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        $last = Product::orderBy('created_at')->first();

        return view('category', compact('products', 'categories','last'));
    }

    public function jsonProducts($name){
    if($name == 0){
        $products = Product::all();
    } else {
        $products = Product::whereHas('category', function ($query) use ($name) {
            $query->where('category_id', '=', $name);
        })->get();
    }

    return response()->json($products);
}

    public function jsonUrl(){
        $products = Product::all();
        $loop = 1;
        foreach ($products as $prod){
            $url[$loop] = $prod->pictures()->first()->url;
            $loop++;
        }

        return response()->json($url);
    }

    public function jsonAllProducts(){
        $products = Product::all('name');

        return response()->json($products, 200);
    }

    public function redirectToProduct($productName){

        $product = DB::table('products')->where('name', '=', $productName)->get()->toArray();

        return redirect()->route('product', $product[0]->id);
    }
}
