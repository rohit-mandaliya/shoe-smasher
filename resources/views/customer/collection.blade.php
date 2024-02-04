@extends('customer.layouts.main')
@section('content')
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @forelse($shoes as $shoe)
            <div class="col">
                <a href="{{ route('customer.productShow', $shoe->id) }}">
                    <div class="card shoes">
                        <img class="card-img-top" src="{{ asset('images/shoes/' . $shoe->image) }}" style="max-height: 270px"
                            alt="Card image cap">
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
@endsection
