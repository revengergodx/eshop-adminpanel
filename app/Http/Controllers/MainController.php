<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $order = Order::all();
        $products = Product::all();
        $users = User::all();

        return view('main.index', compact('order', 'products', 'users'));
    }
}
