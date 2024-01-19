<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();

        return response()->json($orders);
    }

    public function show(Order $order)
    {
        return response()->json($order);
    }

    public function create(Request $request)
    {
        $rules=[
            'item' => 'required|string',
            'quantity' => 'required|integer',
            'description' => 'required|string',
        ];

        $validator = Validator::make($request->all(), $rules);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $order = Order::create($request->all());

        return response()->json($order);
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'item' => 'required|string',
            'quantity' => 'required|integer',
            'description' => 'required|string',
        ]);

        $order->update($request->all());

        return response()->json($order);
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return response()->json(['message' => 'Order deleted successfully']);
    }
}
