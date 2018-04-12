<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

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
}
