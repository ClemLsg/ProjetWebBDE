<?php

namespace App\Http\Controllers\API;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class OrderAPIController extends BaseAPIController
{
    /**
     * Display a listing of all orders by querying through the order_product table.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $orders = DB::table('order_product')->pluck('order_id')->toArray();

        $order = array();

        foreach($orders as $order_id){
            array_push($order, Order::find($order_id)->products()->get());
        }

        return $this->sendPositiveResponse($order, 'Try', 200);
    }

    /**
     * Store a newly created order in the database.
     * Use of the Validator facade to make sure that the data sent by the user are correct.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'status' => 'required',
            'user_id' => 'required',
            'products' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('The content of the request does not satisfy the validator.', 412);
        }

        Order::create([
            'status' => $input['status'],
            'user_id' => $input['user_id']
        ]);

        $lastEntry = Order::latest()->first();
        $lastId = $lastEntry['id'];

        foreach($input['products'] as $product){
            DB::table('order_product')->insert([
                'order_id' => $lastId,
                'product_id' => $product['product_id'],
                'quantity' => $product['quantity']
            ]);
    }

        return $this->sendPositiveResponse($input, 'Order created correctly.', 201);
    }

    /**
     * Display a specific order by querying through the order model.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $order = Order::find($id)->products()->get();

        if(is_null($order)){
            return $this->sendError('Order not found.', 404);
        }

        return $this->sendPositiveResponse($order->toArray(),'Order properly shown.', 200);
    }

    /**
     * Update the specified order in the database.
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
            'status' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', 412);
        }

        $order = Order::find($id);
        if (is_null($order)) {
            return $this->sendError('Activity not found.', 404);
        }


        $order->status = $input['status'];
        $order->save();


        return $this->sendPositiveResponse($order->toArray(), 'Order updated successfully.', 200);
    }

    /**
     * Remove the specified order from the database.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $products = DB::table('order_product')->where('order_id', '=',$id)->get();

        if(is_null($products)){
            return $this->sendError('No products in this order.', '404');
        }

        DB::table('order_product')->where('order_id', '=',$id)->delete();

        $order = Order::find($id);

        if(is_null($order)){
            return $this->sendError('Order not found.', 404);
        }

        $order->delete();

        return $this->sendPositiveResponse($id, 'Order deleted successfully.', 200);
    }
}
