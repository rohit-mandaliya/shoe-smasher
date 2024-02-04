@extends('customer.layouts.main')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/wizard-ex-checkout.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bs-stepper/bs-stepper.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/rateyo/rateyo.css') }}" />
@endsection
@section('content')
    <div class="card">
        <div class="card-header  border-bottom mb-0">
            <div class="row">
                <div class="col-md-6 d-flex">
                    <i class="fa-solid fa-cart-shopping mt-2"></i>&nbsp;&nbsp;
                    <h5 class="mt-2">Your Cart</h5>
                </div>
                <div class="col-md-6 mt-2">
                    <h5 style="float: right">Total Amount: {{ '₹' . $totalSum . '.00' }}</h5>
                </div>
            </div>
        </div>
        <div class="card-body mt-4">
            <ul class="list-group mb-3">
                @forelse ($items as $item)
                    <li class="list-group-item p-4">
                        <div class="d-flex gap-3">
                            <div class="flex-shrink-0">
                                <img src="{{ asset('images/shoes/' . $item->shoes->image) }}" alt="google home"
                                    class="w-px-100" />
                            </div>
                            <div class="flex-grow-1">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h6 class="fw-normal mb-2 me-3">
                                            <a href="{{ route('customer.productShow', $item->shoes->id) }}"
                                                class="text-body">{{ $item->shoes->name }}</a><br>
                                            <span class="me-1">{{ $item->shoes->description }}</span>
                                        </h6>

                                        <div class="text-muted mb-1 d-flex flex-wrap">
                                            <span class="me-1">Size: <b>{{ $item->size }}</b></span>
                                            <span class="badge bg-label-success ms-2">In Stock</span>
                                        </div>
                                        <span class="me-1">Quantity: <b>{{ $item->quantity }}</b></span>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="text-md-end">
                                            <a href="{{ route('customer.removeFromCart', $item->id) }}"
                                                class="btn-close btn-pinned" aria-label="Close"></a>
                                            <div class="my-2 my-md-4">
                                                <span class="text-primary">₹
                                                    {{ $item->quantity * round($item->shoes->price - ($item->shoes->price * $item->shoes->discount) / 100) }}/</span><s
                                                    class="text-muted">{{ $item->quantity * $item->shoes->price }}</s>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                @empty
                    <li class="list-group-item p-4 text-center">
                        <span class="text-danger h5 ">Cart is empty!</span>
                    </li>
                @endforelse

            </ul>
            @if (count($items) > 0)
                <div class="card-footer text-center">
                    <a href="{{ route('customer.addToCartBuyNow') }}" class="btn btn-danger">Checkout Now
                        {{ '( ₹ ' . $totalSum . '.00 )' }}</a>
                </div>
            @endif
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('assets/vendor/libs/cleavejs/cleave.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/cleavejs/cleave-phone.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/bs-stepper/bs-stepper.js') }}"></script>
    <script src="{{ asset('assets/js/wizard-ex-checkout.js') }}"></script>
@endsection
