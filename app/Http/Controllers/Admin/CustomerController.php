<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $customers = Customer::when($search, function ($q, $search) {
            $q->where('name', 'LIKE', "$search%");
        })->simplePaginate(20);

        return view('admin.customers.index', compact('customers', 'search'));
    }
}
