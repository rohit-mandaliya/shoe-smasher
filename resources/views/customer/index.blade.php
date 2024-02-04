@extends('customer.layouts.main')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/swiper/swiper.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/ui-carousel.css') }}">
@endsection
@section('content')
    <div class="card">
        <div id="carouselExample" class="carousel slide pointer-event" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                <li data-bs-target="#carouselExample" data-bs-slide-to="0" class="active"></li>
                <li data-bs-target="#carouselExample" data-bs-slide-to="1"></li>
                <li data-bs-target="#carouselExample" data-bs-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="../../assets/img/branding/shoe1.jpg" alt="First slide"
                        style="max-height: 600px">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>Casual Trip</h3>
                        <p>Your Casual Adventure Awaits.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="../../assets/img/branding/shoe2.jpg" alt="Second slide"
                        style="max-height: 600px">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>Sports Dhamaka</h3>
                        <p>The Ultimate Sports Companion.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="../../assets/img/branding/shoe3.jpg" alt="Third slide"
                        style="max-height: 600px">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>Sneakers Pickers</h3>
                        <p>Unleash Your Inner Sneakerhead.</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExample" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExample" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </a>
        </div>



        <div class="p-4 py-5 mt-4">
            <h1 class="text-center pb-3">Our Latest Collection</h1>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @forelse($shoes as $shoe)
                    <div class="col">
                        <a href="{{ route('customer.productShow', $shoe->id) }}">
                            <div class="card shoes">
                                <img class="card-img-top" src="{{ asset('images/shoes/' . $shoe->image) }}"
                                    style="max-height: 270px" alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">{{ $shoe->name }}</h4>
                                    <div class="mb-2 d-flex">
                                        <h4 class="text-primary">₹
                                            {{ round($shoe->price - ($shoe->price * $shoe->discount) / 100) }}/
                                        </h4><s class="h5 mt-1 text-muted">{{ $shoe->price }}</s>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="col-md-12 text-center">
                        <div class="card ">
                            <div class="card-body">
                                <span class="fw-bold text-muted">Sorry No Records Found</span>
                            </div>
                        </div>
                    </div>
                @endforelse

            </div>
        </div>

        <div class="help-center-popular-articles py-4 p-4">
            <h1 class="text-center pb-3">Our Services</h1>
            <div class="row">
                <div class="col-lg-12 mx-auto">
                    <div class="row mb-3">
                        <div class="col-md-4 mb-md-0 mb-4">
                            <div class="card border shadow-none">
                                <div class="card-body text-center">
                                    <div class="avatar mx-auto mb-2 mt-4">
                                        <span class="link-success "><i class="fa-solid fa-truck fs-2"></i></span>
                                    </div>
                                    <h5 class="mt-4">Faster Delivery</h5>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-md-0 mb-4">
                            <div class="card border shadow-none">
                                <div class="card-body text-center">
                                    <div class="avatar mx-auto mb-2 mt-4">
                                        <span class="link-danger "><i
                                                class="fa-solid fa-arrow-right-arrow-left fs-2"></i></span>
                                    </div>
                                    <h5 class="mt-4">Easy Return</h5>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card border shadow-none">
                                <div class="card-body text-center">
                                    <div class="avatar mx-auto mb-2 mt-4">
                                        <span class="link-warning "><i class="fa-solid fa-tags fs-2"></i></span>
                                    </div>
                                    <h5 class="mt-4">Weekly Offers</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/vendor/libs/swiper/swiper.js') }}"></script>
    <script src="{{ asset('assets/js/ui-carousel.js') }}"></script>
@endsection
