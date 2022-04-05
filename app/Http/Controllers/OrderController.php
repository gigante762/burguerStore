<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();

        $data['status'] = 'pending';
        $data['code'] = 'P'.rand(1,100);
        $data['total_price'] = rand(1,100);
        $data['cart'] = '{"1":{"id":1,"name":"Product 1","price":"10.00","quantity":1},"2":{"id":2,"name":"Product 2","price":"20.00","quantity":1}}';

        Order::create($data);

        // dispatch an event to the customer
        // event(new OrderCreated($order));

        return response()->json(['message' => 'Order created successfully!'], 201);
    }

}
