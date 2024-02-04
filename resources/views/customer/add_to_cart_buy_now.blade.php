@extends('customer.layouts.main')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/wizard-ex-checkout.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bs-stepper/bs-stepper.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/rateyo/rateyo.css') }}" />
@endsection
@section('content')
    <div id="wizard-checkout" class="bs-stepper wizard-icons wizard-icons-example mt-2">
        <div class="bs-stepper-header m-auto border-0">
            <div class="step" data-target="#checkout-cart">
                <button type="button" class="step-trigger">
                    <span class="bs-stepper-icon">
                        <svg viewBox="0 0 58 54">
                            <use xlink:href="../../assets/svg/icons/wizard-checkout-cart.svg#wizardCart"></use>
                        </svg>
                    </span>
                    <span class="bs-stepper-label">Cart</span>
                </button>
            </div>
            <div class="line">
                <i class="bx bx-chevron-right"></i>
            </div>
            <div class="step" data-target="#checkout-address">
                <button type="button" class="step-trigger">
                    <span class="bs-stepper-icon">
                        <svg viewBox="0 0 54 54">
                            <use xlink:href="../../assets/svg/icons/wizard-checkout-address.svg#wizardCheckoutAddress">
                            </use>
                        </svg>
                    </span>
                    <span class="bs-stepper-label">Address</span>
                </button>
            </div>
            <div class="line">
                <i class="bx bx-chevron-right"></i>
            </div>
            <div class="step" data-target="#checkout-payment">
                <button type="button" class="step-trigger">
                    <span class="bs-stepper-icon">
                        <svg viewBox="0 0 58 54">
                            <use xlink:href="../../assets/svg/icons/wizard-checkout-payment.svg#wizardPayment"></use>
                        </svg>
                    </span>
                    <span class="bs-stepper-label">Payment</span>
                </button>
            </div>
        </div>
        <div class="bs-stepper-content border-top">
            <span id="wizard-checkout-form"></span>
            <!-- Cart -->
            <div id="checkout-cart" class="content">
                <div class="row">
                    <!-- Cart left -->
                    <div class="col-xl-8 mb-3 mb-xl-0">
                        <!-- Shopping bag -->
                        {{-- <h5>My Shopping Bag (2 Items)</h5> --}}
                        <ul class="list-group mb-3">
                            @foreach ($items as $item)
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
                            @endforeach

                        </ul>
                    </div>
                    <div class="col-xl-4">
                        <div class="border rounded p-3 mb-3">
                            <!-- Price Details -->
                            <h6>Price Details</h6>
                            <dl class="row mb-0">
                                <dt class="col-6 fw-normal">Total</dt>
                                <dd class="col-6 text-end">₹
                                    {{ $totalSum + $totalDiscount }}
                                </dd>

                                <dt class="col-6 fw-normal">Discount</dt>
                                <dd class="col-6 text-primary text-end">₹
                                    {{ $totalDiscount }}
                                </dd>

                                <dt class="col-6 fw-normal">Order Total</dt>
                                <dd class="col-6 text-end">
                                    ₹{{ $totalSum }}
                                </dd>

                                <dt class="col-6 fw-normal">Delivery Charges</dt>
                                <dd class="col-6 text-end text-muted">
                                    <s>₹40.00</s> <span class="badge bg-label-success">Free</span>
                                </dd>
                            </dl>
                            <hr class="mx-n3 mt-0" />
                            <dl class="row mb-0">
                                <dt class="col-6">Total</dt>
                                <dd class="col-6 fw-semibold text-end mb-0">
                                    ₹{{ $totalSum . '.00' }}
                                </dd>
                            </dl>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Address -->
            <div id="checkout-address" class="content">
                <div class="row">
                    <!-- Address left -->
                    <div class="col-xl-9 mb-3 mb-xl-0 border rounded p-3">
                        <!-- Select address -->
                        <h4>Your Address</h4>
                        <hr>
                        <div class="row mb-3">
                            <div class="col-md mb-md-0 mb-2">
                                <span class="h5">{{ $address->customer->name }}</span>
                                <h2 class="badge bg-label-primary" style="float: right">
                                    {{ config('constants.location.' . $address->location) }}</h2>
                            </div>
                            <p style="font-size: large">{{ $address->address }}</p>

                        </div>
                    </div>

                    <!-- Address right -->
                    <div class="col-xl-3">
                        <div class="border rounded p-3 mb-3">
                            <!-- Price Details -->
                            <h6>Price Details</h6>
                            <dl class="row mb-0">
                                <dt class="col-6 fw-normal">Total</dt>
                                <dd class="col-6 text-end">₹
                                    {{ $totalSum + $totalDiscount }}
                                </dd>

                                <dt class="col-6 fw-normal">Discount</dt>
                                <dd class="col-6 text-primary text-end">₹
                                    {{ $totalDiscount }}
                                </dd>

                                <dt class="col-6 fw-normal">Order Total</dt>
                                <dd class="col-6 text-end">
                                    ₹{{ $totalSum }}
                                </dd>

                                <dt class="col-6 fw-normal">Delivery Charges</dt>
                                <dd class="col-6 text-end text-muted">
                                    <s>₹40.00</s> <span class="badge bg-label-success">Free</span>
                                </dd>
                            </dl>
                            <hr class="mx-n3 mt-0" />
                            <dl class="row mb-0">
                                <dt class="col-6">Total</dt>
                                <dd class="col-6 fw-semibold text-end mb-0">
                                    ₹{{ $totalSum . '.00' }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Payment -->
            <div id="checkout-payment" class="content">
                <div class="row">
                    <!-- Payment Tabs -->
                    <div class="col-xl-6">
                        <ul class="nav nav-pills" id="paymentTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-cc-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-cc" type="button" role="tab" aria-controls="pills-cc"
                                    aria-selected="true">
                                    Card
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-cod-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-cod" type="button" role="tab" aria-controls="pills-cod"
                                    aria-selected="false">
                                    Cash On Delivery
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content px-0" id="paymentTabsContent">
                            <!-- Credit card -->
                            <div class="tab-pane fade show active" id="pills-cc" role="tabpanel"
                                aria-labelledby="pills-cc-tab">
                                <form action="{{ route('customer.orderConfirmedCart') }}" id="orderConfirmed"
                                    method="post">
                                    @csrf
                                    <div class="row g-3">
                                        <div class="col-12">
                                            <label class="form-label w-100">Card Number</label>
                                            <div class="input-group input-group-merge">
                                                <input id="card_no" name="card_no"
                                                    class="form-control credit-card-mask" type="text"
                                                    placeholder="1356 3215 6548 7898" aria-describedby="paymentCard2" />
                                                <span class="input-group-text cursor-pointer p-1" id="paymentCard2"><span
                                                        class="card-type"></span></span>
                                            </div>
                                            <span id="cardNo" class="fv-plugins-message-container invalid-feedback"
                                                role="alert">
                                                <strong>This field is required.</strong>
                                            </span>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label class="form-label">Name</label>
                                            <input type="text" name="card_name" id="card_name" class="form-control"
                                                placeholder="John Doe" />
                                            <span id="cardName"
                                                class="fv-plugins-message-container invalid-feedback d-none"
                                                role="alert">
                                                <strong>This field is required.</strong>
                                            </span>
                                        </div>
                                        <div class="col-6 col-md-3">
                                            <label class="form-label">Exp. Date</label>
                                            <input type="text" name="exp_date" id="exp_date"
                                                class="form-control expiry-date-mask" placeholder="MM/YY" />
                                            <span id="cardExp"
                                                class="fv-plugins-message-container invalid-feedback d-none"
                                                role="alert">
                                                <strong>This field is required.</strong>
                                            </span>
                                        </div>
                                        <div class="col-6 col-md-3">
                                            <label class="form-label">CVV Code</label>
                                            <div class="input-group input-group-merge">
                                                <input type="text" name="cvv" id="cvv"
                                                    class="form-control cvv-code-mask" maxlength="3"
                                                    placeholder="654" />
                                                <span class="input-group-text cursor-pointer" id="paymentCardCvv2"><i
                                                        class="bx bx-help-circle text-muted" data-bs-toggle="tooltip"
                                                        data-bs-placement="top"
                                                        title="Card Verification Value"></i></span>
                                                <span id="card_cvv"
                                                    class="fv-plugins-message-container invalid-feedback d-none"
                                                    role="alert">
                                                    <strong>This field is required.</strong>
                                                </span>
                                            </div>
                                            <input type="hidden" name="is_cod" value="0">
                                            <input type="hidden" name="shoe_ids[]" value="@json($shoes)">
                                            <input type="hidden" name="sizes[]" value="@json($sizes)">
                                            <input type="hidden" name="quantities[]"
                                                value="@json($quantities)">
                                            <input type="hidden" name="total_price" value="{{ $totalSum }}">
                                        </div>
                                        <div class="mt-4 col-12">
                                            <input type="submit" id="cardPayment" value="Place Order"
                                                class="btn btn-primary">
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <!-- COD -->
                            <div class="tab-pane fade" id="pills-cod" role="tabpanel" aria-labelledby="pills-cod-tab">
                                <p class="fw-semibold">
                                    Cash on Delivery is a type of payment method where the recipient make payment
                                    for the
                                    order at the time of delivery rather than in advance.
                                </p>
                                <input type="hidden" name="is_cod" value="1" form="orderConfirmed">
                                <button type="button" id="codPayment" class="btn btn-primary">Place Order</button>
                            </div>
                        </div>
                    </div>
                    <!-- Address right -->
                    <div class="col-xl-6">
                        <div class="border rounded p-3 mb-3">
                            <!-- Price Details -->
                            <h6>Price Details</h6>
                            <dl class="row mb-0">
                                <dt class="col-6 fw-normal">Total</dt>
                                <dd class="col-6 text-end">₹
                                    {{ $totalSum + $totalDiscount }}
                                </dd>

                                <dt class="col-6 fw-normal">Discount</dt>
                                <dd class="col-6 text-primary text-end">₹
                                    {{ $totalDiscount }}
                                </dd>

                                <dt class="col-6 fw-normal">Order Total</dt>
                                <dd class="col-6 text-end">
                                    ₹{{ $totalSum }}
                                </dd>

                                <dt class="col-6 fw-normal">Delivery Charges</dt>
                                <dd class="col-6 text-end text-muted">
                                    <s>₹40.00</s> <span class="badge bg-label-success">Free</span>
                                </dd>
                            </dl>
                            <hr class="mx-n3 mt-0" />
                            <dl class="row mb-0">
                                <dt class="col-6">Total</dt>
                                <dd class="col-6 fw-semibold text-end mb-0">
                                    ₹{{ $totalSum . '.00' }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('assets/vendor/libs/cleavejs/cleave.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/cleavejs/cleave-phone.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/bs-stepper/bs-stepper.js') }}"></script>
    <script src="{{ asset('assets/js/wizard-ex-checkout.js') }}"></script>

    <script>
        $('#cardPayment').click(function() {
            if ($('#card_no').val() == '') {
                $('#cardNo').removeClass('d-none');
                alert('Fill the card information first!');
                return false;
            } else if ($('#card_name').val() == '') {
                $('#cardName').removeClass('d-none');
                alert('Fill the card information first!');
                return false;
            } else if ($('#exp_date').val() == '') {
                $('#cardExp').removeClass('d-none');
                alert('Fill the card information first!');
                return false;
            } else if ($('#cvv').val() == '') {
                $('#card_cvv').removeClass('d-none');
                alert('Fill the card information first!');
                return false;
            }

            $('#orderConfirmed').submit();
        });

        $('#codPayment').click(function() {
            $('#orderConfirmed').submit();
        })
    </script>
@endsection
