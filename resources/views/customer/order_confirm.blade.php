@extends('customer.layouts.main')
@section('content')
    <!-- Confirmation -->
    <div id="checkout-confirmation" class="content card p-3">
        <div class="row mb-3">
            <div class="col-12 mt-4 col-lg-8 offset-lg-2 text-center mb-3">
                <h4 class="mt-2">Thank You! 😇</h4>
                <p>Your order <a href="javascript:void(0)">#{{ session()->get('order_no') }}</a> has been placed!</p>
                <p>
                    We are delighted to inform you that your order has been successfully confirmed and is now in progress.
                    Your trust in <b>ShoeSmasher</b> is greatly appreciated. Below are the details of your purchase:
                </p>
                <p>
                    <span class="fw-semibold"><i class="bx bx-time-five"></i> Time placed:</span>&nbsp;&nbsp;
                    {{ date('d M Y H:i:s', strtotime(session()->get('order_place_date'))) }}
                </p>
                <a href="{{ route('customer.collection') }}" class="btn btn-primary">Continue Shopping</a>
            </div>

        </div>
    </div>
@endsection
