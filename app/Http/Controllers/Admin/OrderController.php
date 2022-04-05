<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return Order::all();
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $data['status'] = 'pending';
        $data['code'] = uniqid('ID#');
        $data['total_price'] = rand(1,100);
        $data['cart'] = '{"1":{"id":1,"name":"Product 1","price":"10.00","quantity":1},"2":{"id":2,"name":"Product 2","price":"20.00","quantity":1}}';

        Order::create($data);

        // dispatch an event to the customer
        // event(new OrderCreated($order));

        return response()->json(['message' => 'Order created successfully!'], 201);
    }

    public function update(Request  $request, Order $order)
    {
        $order->update($request->all());

        return redirect()->route('orders.index');
    }

    public function destroy(Request  $request, Order $order)
    {
        $order->delete();

        return redirect()->route('orders.index');
    }
}
