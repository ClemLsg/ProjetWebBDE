<?php

namespace App\Http\Controllers\API;

use App\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ProductsAPIController extends BaseAPIController
{
    /**
     * Display a listing of all products by querying through the Product model.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $products = Product::all();

        return $this->sendPositiveResponse($products, 'All products have been retrieved successfully.', 200);
    }

    /**
     * Store a newly created product in the database.
     * Use of the Validator facade to make sure that the data sent by the user are correct.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
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
     * Display a specific product by querying through the Product model.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
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
     * Update the specified product in the database.
     * Use of the Validator facade to make sure that the data sent by the user are correct.
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'required',
            'price' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', 412);
        }

        $product = Product::find($id);
        if (is_null($product)) {
            return $this->sendError('Post not found.', 404);
        }


        $product->name = $input['name'];
        $product->price = $input['price'];
        $product->save();


        return $this->sendPositiveResponse($product->toArray(), 'Post updated successfully.', 200);
    }

    /**
     * Remove the specified product from the database.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
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
