@extends('customer.layouts.main')

@section('content')
    <div class="card h-100">
        <div class="card-body">
            <h5 class="card-title">{{ $shoe->name }}</h5>
            <h6 class="card-subtitle text-muted">{{ config('constants.shoeType.' . $shoe->type) }} Shoes</h6>
            <div class="row">
                <div class="col-md-6">
                    <img class="img-fluid d-flex mx-auto my-4 rounded" src="{{ asset('images/shoes/' . $shoe->image) }}"
                        alt="Card image cap" height="600" width="600">
                </div>
                <div class="col-md-6 mt-4">
                    <form action="#" method="post" class="buyForm">
                        @csrf
                        <div>
                            <h5 class="mb-0">{{ $shoe->name }}</h5><br>
                            <div class="d-flex">
                                <h4 class="text-primary">₹
                                    {{ round($shoe->price - ($shoe->price * $shoe->discount) / 100) }}/
                                </h4><s class="h5 mt-1 text-muted">{{ $shoe->price }}</s>
                                <p>&nbsp;&nbsp;(Inclusive of All Taxes)</p>
                            </div>
                            <p>{{ $shoe->description }}</p>
                            <hr>
                        </div>
                        <label class="form-label mt-4">Sizes</label><br>
                        <div class="btn-group gap-3 mt-2" role="group" aria-label="Basic radio toggle button group">
                            @foreach ($shoe->stocks as $key => $stock)
                                <input type="radio" class="btn-check" value="{{ $stock->size }}"
                                    id="btnradio-{{ $stock->size }}" name="size" @checked($key == 0)>
                                <label class="btn btn-outline-secondary"
                                    for="btnradio-{{ $stock->size }}">{{ $stock->size }}</label>
                            @endforeach
                            <input type="hidden" name="shoe_id" value="{{ $shoe->id }}">

                        </div>
                        <div class="mt-4">
                            <label class="form-label">Quantity</label><br>
                            <div class="d-flex">
                                <a class="btn btn-outline-secondary mt-2" onclick="quantity('-')">-</a>
                                <input type="text" name="quantity" class="form-control text-center ms-2 me-2 mt-2"
                                    min="1" value="1" style="width: 70px" id="quantityVal" readonly>
                                <a class="btn btn-outline-secondary mt-2" onclick="quantity('+')">+</a>
                            </div>
                        </div>
                        <div class="mt-4">
                            <a onclick="formSubmit('addToCart')" class="save btn btn-outline-secondary mt-2"><span
                                    class="fa-solid fa-cart-shopping"></span>&nbsp;ADD TO CART</a>
                            &nbsp;&nbsp;
                            @if ($customerHasAddress != 1)
                                @php
                                    session()->put('prod_id', $shoe->id);
                                @endphp
                                <a class="btn btn-danger mt-2" href="{{ route('customer.address') }}"
                                    style="color:white">BUY
                                    NOW</a>
                            @else
                                <a class="save btn btn-danger mt-2" onclick="formSubmit('buyNow')" style="color:white">BUY
                                    NOW</a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('scripts')
    <script>
        var quantityVal = parseInt($('#quantityVal').val());

        function quantity(sign) {
            if (sign == '+') {
                if (quantityVal > 9)
                    return false;
                $('#quantityVal').val(++quantityVal);

            } else if (sign == '-') {
                if (quantityVal < 2)
                    return false;
                $('#quantityVal').val(--quantityVal);
            }
        }

        function formSubmit(actionForm) {
            if (actionForm == 'buyNow') {
                $('.buyForm').attr('action', "{{ route('customer.buyNow') }}");
                $('.buyForm').submit();
            } else if (actionForm == 'addToCart') {
                $('.buyForm').attr('action', "{{ route('customer.addToCart') }}");
                $('.buyForm').submit();
            }
        }
    </script>
@endsection
