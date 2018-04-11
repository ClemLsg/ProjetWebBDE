<?php

namespace App\Http\Controllers\API;

use App\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ProductsAPIController extends BaseAPIController
{
    /**
     * Display a listing of all the products in a JSON format
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return $this->sendPositiveResponse($products, 'All products have been retrieved successfully.', 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'required',
            'price' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('The content of the request does not satisfy the validator.', 412);
        }

        $product = Product::create($input);

        return $this->sendPositiveResponse($product->toArray(),'Product created successfully.', 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        if(is_null($product)){
            return $this->sendError('Product not found.',404);
        }

        return $this->sendPositiveResponse($product->toArray(),'The wanted product has been retrieved successfully.',200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        if(is_null($product)){
            return $this->sendError('Post not found', 404);
        }

        $product->delete();

        return $this->sendPositiveResponse($id, 'Product deleted successfully.', 200);
    }
}
