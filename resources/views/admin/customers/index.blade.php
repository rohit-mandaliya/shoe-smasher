@extends('admin.layout.main')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}">
@endsection
@section('content')
    <div class="col-md">
        <div class="card card-action mb-4">
            <div class="card-header">
                <h5 class="card-action-title">{{ __('Shoes Collection') }}</h5>
                <div class="card-action-element">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                            <a href="javascript:void(0);" class="card-expand">
                                <i class="tf-icons bx bx-fullscreen"></i>
                            </a>
                        </li>

                        <li class="list-inline-item">
                            <a href="javascript:void(0);" class="card-collapsible">
                                <i class="tf-icons bx bx-chevron-up"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="card-body">

                <form action="#" method="GET">
                    <div class="d-flex row">
                        <div class="col-md-3 mt-3">
                            <div class="form-group">
                                <div class="position-relative has-icon-left">
                                    <input type="text" name="search" class="form-control"
                                        placeholder="Search by Customer Name" value="{{ $search ?? '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mt-3">
                            <button type="submit" class="btn rounded-pill btn-label-danger">
                                <i class="fa-solid fa-filter m-1"></i>
                            </button>
                            <a class="ms-2" href="{{ route('customers.index') }}">
                                <button type="button" class="btn rounded-pill btn-label-primary">
                                    <i class="fa-solid fa-arrows-rotate m-1"></i>
                                </button>
                            </a>
                        </div>
                    </div>
                </form>

                <div class="row mt-4">
                    <div class="card-content collapse show">
                        <div class="table-responsive">
                            <table class="table table-bordered table-responsive-lg">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">{{ __('Name') }}</th>
                                        <th class="text-center">{{ __('Email') }}</th>
                                        <th class="text-center">{{ __('Phone') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($customers as $customer)
                                        <tr>
                                            <td class="text-center">
                                                {{ $loop->iteration + ($customers->currentPage() - 1) * $customers->perPage() }}
                                            </td>
                                            <td class="text-center">
                                                {{ $customer->name }}
                                            </td>
                                            <td class="text-center">
                                                {{ $customer->email }}
                                            </td>
                                            <td class="text-center">
                                                {{ $customer->phone }}
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="12" class="text-center">
                                                <div class="alert alert-danger mt-3" role="alert">
                                                    {{ __('No records found!') }}
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="d-flex flex-row-reverse mt-1">
                        {{ $customers->appends($_REQUEST)->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- / Content -->
@endsection
@section('scripts')
    <script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>

    <script>
        $('.delete_confirm').click(function(event) {
            var form = $(this).closest("form");
            event.preventDefault();
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: !0,
                confirmButtonText: "Yes, Delete it!",
                customClass: {
                    confirmButton: "btn btn-danger me-3",
                    cancelButton: "btn btn-label-secondary",
                },
                buttonsStyling: !1,
            }).then(function(result) {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    </script>
@endsection
