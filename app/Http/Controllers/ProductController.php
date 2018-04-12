<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index($id)
    {
        $produit = Product::findOrFail($id);
        $remise = ceil(($produit->price)/0.7);
        $picture = Product::findOrFail($id)->pictures()->get();
        $yes = $picture->first()->comments()->first();

        return view('product', compact('produit', 'remise','picture','yes','name'));
    }
}
