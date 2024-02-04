<?php

namespace App\Http\Controllers\Customer;

use App\Models\Customer;
use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\AddAddressRequest;
use App\Http\Requests\Customer\AddCustomerRequest;
use App\Http\Requests\Customer\LoginRequest;
use App\Models\AddToCart;
use App\Models\CustomerAddress;
use App\Models\Order;
use App\Models\Shoe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    var $guard = 'customer';
    /**
     * Display a listing of the resource.
     */
    public function loginPage()
    {
        return view('customer.login');
    }

    public function login(LoginRequest $request)
    {

        $data = $request->validated();

        $credentials = [
            'email' => $data['email'],
            'password' => $data['password']
        ];

        if (Auth::guard($this->guard)->attempt($credentials)) {
            return to_route('customer_index')->with('success_customer', 'Login successfully.');
        } else {
            return to_route('customer.login-page-customer')->with('failure_customer', 'Your credentials does not match our records');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customer.create');
    }

    public function register(AddCustomerRequest $request)
    {
        $data = $request->validated();
        $credentials = [
            'email' => $data['email'],
            'password' => $data['password']
        ];

        $data['password'] = bcrypt($data['password']);

        try {
            Customer::create($data);

            Auth::guard($this->guard)->attempt($credentials);

            return to_route('customer_index')->with('success_customer', 'Registered successfully.');
        } catch (\Exception $e) {
            return to_route('customer_index')->with('failure_customer', 'Customer not registered' . $e->getMessage());
        }
    }

    public function getAddressPage()
    {
        return view('customer.address');
    }

    public function storeAddress(AddAddressRequest $request)
    {
        $data = $request->validated();

        try {
            $data['customer_id'] = Auth::guard('customer')->user()->id;
            // return $data;
            CustomerAddress::create($data);
            return to_route('customer.productShow', session()->get('prod_id') ?? 1)->with('success_customer', 'Address added successfully.');
        } catch (\Exception $e) {
            return back()->with('failure_customer', 'Address not added!' . $e->getMessage());
        }
    }

    public function logout()
    {
        Auth::guard($this->guard)->logout();
        return to_route('customer.login-page-customer');
    }

    public function productShow($id)
    {
        session()->forget('prod_id');

        $shoe = Shoe::with('stocks')->find($id);

        $customerHasAddress = CustomerAddress::where('customer_id', Auth::guard('customer')->user()->id)
            ->first();

        $customerHasAddress = empty($customerHasAddress) ? 0 : 1;

        return view('customer.product_show', compact('shoe', 'customerHasAddress'));
    }

    public function buyNow(Request $request)
    {
        $quantity = $request->quantity;
        $size = $request->size;
        $shoe = Shoe::find($request->shoe_id);
        $address = CustomerAddress::with('customer')->where('customer_id', Auth::guard('customer')->user()->id)->first();

        return view('customer.buy_now', compact('quantity', 'size', 'shoe', 'address'));
    }

    public function addToCart(Request $request)
    {
        $customer_id = Auth::guard('customer')->user()->id;
        try {
            $alreadyExist = AddToCart::where('customer_id', $customer_id)
                ->where('shoe_id', $request->shoe_id)
                ->where('size', $request->size)
                ->first();

            if ($alreadyExist)
                return to_route('customer.productShow', $request->shoe_id)->with('failure_customer', 'Already in your cart.');

            AddToCart::create([
                'customer_id' => $customer_id,
                'shoe_id' => $request->shoe_id,
                'size' => $request->size,
                'quantity' => $request->quantity
            ]);

            return to_route('customer.productShow', $request->shoe_id)->with('success_customer', 'Added to cart successfully.');
        } catch (\Exception $e) {
            return to_route('customer.productShow', $request->shoe_id)->with('failure_customer', 'Not added.' . $e->getMessage());
        }
    }

    public function addToCartPage()
    {
        $items = AddToCart::with('shoes')->where('customer_id', Auth::guard('customer')->user()->id)->get();
        $itemPrices = [];
        foreach ($items as $item) {
            $itemPrices[] = $item->quantity * round($item->shoes->price - ($item->shoes->price * $item->shoes->discount) / 100);
        }

        $totalSum = array_sum($itemPrices);

        return view('customer.add_to_cart', compact('items', 'totalSum'));
    }

    public function addToCartBuyNow()
    {
        $items = AddToCart::with('shoes')->where('customer_id', Auth::guard('customer')->user()->id)->get();
        $itemPrices = [];
        $totalPrices = [];
        $shoes = [];
        $sizes = [];
        $quantities = [];
        foreach ($items as $item) {
            $shoes[] = $item->shoes->id;
            $sizes[] = $item->size;
            $quantities[] = $item->quantity;
            $totalPrices[] = $item->quantity * $item->shoes->price;
            $itemPrices[] = $item->quantity * round($item->shoes->price - ($item->shoes->price * $item->shoes->discount) / 100);
        }

        $totalSum = array_sum($itemPrices);
        $totalDiscount = array_sum($totalPrices) - $totalSum;
        $address = CustomerAddress::with('customer')->where('customer_id', Auth::guard('customer')->user()->id)->first();

        return view('customer.add_to_cart_buy_now', compact('items', 'shoes', 'sizes', 'quantities', 'address', 'totalSum', 'totalDiscount'));
    }

    public function removeFromCart($id)
    {
        AddToCart::where('id', $id)->delete();
        return to_route('customer.addToCartPage')->with('success_customer', 'Item removed successfully.');
    }

    public function orderConfirmed(Request $request)
    {
        $alpha = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $num = '0123456789';
        $order_no = substr(str_shuffle($alpha), 0, 8) . substr(str_shuffle($num), 0, 5);

        $validator = Validator::make(['order_no' => $order_no], [
            'order_no' => 'unique:orders,order_no'
        ]);

        if ($validator->fails()) {
            $alpha = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $num = '0123456789';
            $order_no = substr(str_shuffle($alpha), 0, 8) . substr(str_shuffle($num), 0, 5);
        }

        $createOrder = Order::create([
            'customer_id' => Auth::guard('customer')->user()->id,
            'order_no' => $order_no,
            'shoe_ids' => $request->shoe_ids,
            'size' => $request->size,
            'quantity' => $request->quantity,
            'total_price' => $request->total_price,
            'card_no' => $request->card_no ?? null,
            'card_name' => $request->card_name ?? null,
            'card_exp' => $request->card_exp ?? null,
            'is_cod' => $request->card_no != null ? 0 : $request->is_cod
        ]);
        session()->put('order_no', $order_no);
        session()->put('order_place_date', $createOrder->created_at);

        return to_route('customer.thankYouPage');
    }

    public function thankYouPage()
    {
        return view('customer.order_confirm');
    }

    public function collection()
    {
        session()->forget(['order_place_date', 'order_no']);

        $shoes = Shoe::all();

        return view('customer.collection', compact('shoes'));
    }

    public function orderConfirmedCart(Request $request)
    {
        $alpha = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $num = '0123456789';
        $order_no = substr(str_shuffle($alpha), 0, 8) . substr(str_shuffle($num), 0, 5);

        $validator = Validator::make(['order_no' => $order_no], [
            'order_no' => 'unique:orders,order_no'
        ]);

        if ($validator->fails()) {
            $alpha = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $num = '0123456789';
            $order_no = substr(str_shuffle($alpha), 0, 8) . substr(str_shuffle($num), 0, 5);
        }

        $createOrder = Order::create([
            'customer_id' => Auth::guard('customer')->user()->id,
            'order_no' => $order_no,
            'shoe_ids' => trim(implode('', $request->shoe_ids), '[]'),
            'size' => trim(implode('', $request->sizes), '[]'),
            'quantity' => trim(implode('', $request->quantities), '[]'),
            'total_price' => $request->total_price,
            'card_no' => $request->card_no ?? null,
            'card_name' => $request->card_name ?? null,
            'card_exp' => $request->card_exp ?? null,
            'is_cod' => $request->card_no != null ? 0 : $request->is_cod
        ]);

        AddToCart::where('customer_id', Auth::guard('customer')->user()->id)->delete();

        session()->put('order_no', $order_no);
        session()->put('order_place_date', $createOrder->created_at);

        return to_route('customer.thankYouPage');
    }
}
