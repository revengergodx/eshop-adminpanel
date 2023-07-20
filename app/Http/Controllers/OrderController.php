<?php

namespace App\Http\Controllers;

use App\Http\Requests\Color\StoreRequest;
use App\Http\Requests\Color\UpdateRequest;
use App\Models\Color;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('order.index', compact('orders'));
    }

    public function edit(Order $order)
    {
        return view('order.edit', compact('order'));
    }

    public function update(UpdateRequest $request, Order $order)
    {
        $data = $request->validated();
        $order->update($data);
        return redirect()->route('order.show', compact('order'));
    }

    public function show(Order $order)
    {
        $order['products'] = json_decode($order['products']);
        return view('order.show', compact('order'));
    }

    public function delete(Order $order)
    {
        $order->delete();
        return redirect()->route('order.index');
    }
}
