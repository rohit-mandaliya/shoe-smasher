<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $orders = Order::withWhereHas('customer', function ($q) use ($search) {
            $q->where('name', 'LIKE', "$search%");
        })->simplePaginate(20);

        return view('admin.orders.index', compact('orders', 'search'));
    }
}
