@extends('admin.layout.main')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/dropzone/dropzone.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom/image-upload.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
@endsection
@section('content')
    <div class="row">
        <!-- Outer Class -->
        <div class="col-12">
            <div class="card">
                <h5 class="card-header">{{ __('Edit Shoe') }}</h5>
                <hr class="mt-0">
                <div class="card-body">
                    <form action="{{ route('shoes.update', $shoe->id) }}"
                        class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <label class="form-label mb-0">{{ __('Image Upload') }}</label>
                        <div class="col-md-12 dropzone needsclick dz-clickable imageClick" onclick="imageClick()"
                            id="dropzone-basic">
                            <i class="iconDisplay fa-solid fa-circle-xmark fa-xl"
                                style="position: absolute;top: 20px;
                    right: 15px;"></i>
                            <img src="{{ asset('images/shoes/' . $shoe->image) }}" class="" id="imageDisplay">
                            <div class="dz-message needsclick fileUpload d-none">
                                {{ __('Drop files here or click to upload') }}
                                <span class="note needsclick">
                                    <strong>{{ __('.jpg, .jpeg, .png') }}</strong> {{ __('files only.') }}</span>
                                <input type="file" name="image" id="imageUpload"
                                    accept="image/png, image/gif, image/jpeg" hidden />
                            </div>
                        </div>
                        @error('image')
                            <span class="fv-plugins-message-container invalid-feedback" role="alert" style="display:block;">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="col-md-6 fv-plugins-icon-container">
                            <small class="form-label">{{ __('Name') }}</small>
                            <div class="input-group input-group-merge mt-2">
                                <input type="text" name="name" id="name" class="form-control" placeholder="Name"
                                    value="{{ $shoe->name }}">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-money-check"></i>
                                </span>
                            </div>
                            @error('name')
                                <span class="fv-plugins-message-container invalid-feedback" role="alert"
                                    style="display:block;">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-6 fv-plugins-icon-container">
                            <small class="form-label">{{ __('Price') }}</small>
                            <div class="input-group input-group-merge mt-2">
                                <input type="price" name="price" placeholder="499.00"
                                    onkeypress="return /[0-9]/i.test(event.key)" class="form-control"
                                    value="{{ $shoe->price }}">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-rupee-sign"></i>
                                </span>
                            </div>
                            @error('price')
                                <span class="fv-plugins-message-container invalid-feedback" role="alert"
                                    style="display:block;">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-4 fv-plugins-icon-container">
                            <small class="form-label">{{ __('discount') }}</small>
                            <div class="input-group input-group-merge mt-2">
                                <input type="text" name="discount" onkeypress="return /[0-9]/i.test(event.key)"
                                    placeholder="Ex. 10" class="form-control" value="{{ $shoe->discount }}">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-layer-group"></i>
                                </span>
                            </div>
                            @error('discount')
                                <span class="fv-plugins-message-container invalid-feedback" role="alert"
                                    style="display:block;">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label class="form-label mt-1">{{ __('Select Type') }}</label>
                            <div class="select2-primary mt-1">
                                <div class="position-relative">
                                    <select name="type" class="select2 form-select">
                                        <option style="display: none" value="0">Select Type</option>
                                        @foreach ($shoeTypes as $key => $val)
                                            <option value="{{ $key }}" @selected($key == $shoe->type)>
                                                {{ $val }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            @error('type')
                                <span class="invalid-feedback" role="alert" style="display:block;">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label class="form-label mt-1">{{ __('Select Size') }}</label>
                            <div class="select2-primary mt-1">
                                <div class="position-relative">
                                    <select name="size[]" id="size_shoe" class="select2 form-select" multiple=""
                                        tabindex="-1" aria-hidden="true">
                                        @foreach ($shoeSizes as $key => $value)
                                            <option value={{ $key }} @selected(in_array($key, array_keys($sizeStock)))>
                                                {{ 'size ' . $value }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @error('size')
                                <span class="invalid-feedback" role="alert" style="display:block;">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-12" id="stockSize">
                            <small class="form-label">{{ __('Stock') }}</small>
                            <div class="input-group input-group-merge mt-2" id="stockBySize">
                            </div>
                            <span class="fv-plugins-message-container invalid-feedback sizeErr d-none" role="alert"
                                style="display:block;">
                                <strong>Please enter stocks of selected sizes.</strong>
                            </span>
                            @error('stock')
                                <span class="fv-plugins-message-container invalid-feedback" role="alert"
                                    style="display:block;">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-12 fv-plugins-icon-container">
                            <small class="form-label">{{ __('Description') }}</small>
                            <div class="input-group input-group-merge mt-2">
                                <textarea name="description" class="form-control">{{ $shoe->description }}</textarea>
                            </div>
                            @error('description')
                                <span class="fv-plugins-message-container invalid-feedback" role="alert"
                                    style="display:block;">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="pt-4">
                            <button type="submit" id="save"
                                class="btn btn-primary me-sm-3 me-1">{{ __('Submit') }}</button>
                            <a href="{{ route('shoes.index') }}">
                                <button type="button" class="btn btn-label-secondary">{{ __('Cancel') }}</button>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /Outer Class -->
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/dropzone/dropzone.js') }}"></script>
    <script src="{{ asset('assets/js/custom/image-update.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/js/forms-selects.js') }}"></script>
    <script>
        var stockWithSize = @json($sizeStock);

        Object.keys(stockWithSize).forEach(function(value) {
            $('#stockBySize').append(
                '<input type="text" id="sizeStockErr' + value +
                '" name="stock[]" onkeypress="return /[0-9]/i.test(event.key)" placeholder = "size ' +
                value + '" value="' + stockWithSize[value] + '" class = "form-control">'
            );
        });

        $('#size_shoe').change(function() {
            $('#stockBySize').html('');

            var shoeStock = $(this).val();

            if (shoeStock.length > 0) {
                $('#stockSize').removeClass('d-none');
            } else {
                $('#stockSize').addClass('d-none');
            }

            shoeStock.forEach(function(i) {
                $('#stockBySize').append(
                    '<input type="text" id="sizeStockErr' + i +
                    '" name="stock[]" onkeypress="return /[0-9]/i.test(event.key)" placeholder = "size ' +
                    i + '" class = "form-control">'
                );

            })
        })

        $('#save').click(function() {
            var shoeStock = $('#size_shoe').val();

            shoeStock.forEach(function(i) {
                if ($('#sizeStockErr' + i).val() == '') {
                    $('.sizeErr').removeClass('d-none');
                    return false;
                } else {
                    $('.sizeErr').addClass('d-none');
                }
            })

            if (!$('.sizeErr').hasClass('d-none')) {
                return false;
            }
        })
    </script>
@endsection
