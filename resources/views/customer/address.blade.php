@extends('customer.layouts.main')
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('customer.storeAddress') }}" method="post"
                class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework">
                @csrf
                <div class="col-12">
                    <div class="row">
                        <div class="col-md mb-md-2 mb-3">
                            <div class="form-check custom-option custom-option-icon">
                                <label class="form-check-label custom-option-content" for="customRadioHome">
                                    <span class="custom-option-body">
                                        <i class="bx bx-home"></i>
                                        <span class="custom-option-title my-2">Home</span>
                                        <span> Delivery time (9am – 9pm) </span>
                                    </span>
                                    <input name="location" class="form-check-input" type="radio" value="1"
                                        id="customRadioHome" checked="">
                                </label>
                            </div>
                        </div>
                        <div class="col-md mb-md-2 mb-3">
                            <div class="form-check custom-option custom-option-icon">
                                <label class="form-check-label custom-option-content" for="customRadioOffice">
                                    <span class="custom-option-body">
                                        <i class="bx bx-briefcase"></i>
                                        <span class="custom-option-title my-2"> Office </span>
                                        <span> Delivery time (9am – 5pm) </span>
                                    </span>
                                    <input name="location" class="form-check-input" type="radio" value="2"
                                        id="customRadioOffice">
                                </label>
                            </div>
                        </div>
                    </div>
                    @error('location')
                        <span class="fv-plugins-message-container invalid-feedback" role="alert" style="display:block;">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-12">
                    <label class="form-label" for="modalAddressAddress1">Address</label>
                    <input type="text" id="modalAddressAddress1" name="address" class="form-control"
                        placeholder="12, Business Park">
                    @error('address')
                        <span class="fv-plugins-message-container invalid-feedback" role="alert" style="display:block;">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-12 col-md-6">
                    <label class="form-label" for="modalAddressLandmark">Landmark</label>
                    <input type="text" id="modalAddressLandmark" name="landmark" class="form-control"
                        placeholder="Ex. Colony">
                    @error('landmark')
                        <span class="fv-plugins-message-container invalid-feedback" role="alert" style="display:block;">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-12 col-md-6">
                    <label class="form-label" for="modalAddressCity">City</label>
                    <input type="text" id="modalAddressCity" name="city" class="form-control"
                        placeholder="Ex. Ahmedabad">
                    @error('city')
                        <span class="fv-plugins-message-container invalid-feedback" role="alert" style="display:block;">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-12 col-md-6">
                    <label class="form-label" for="modalAddressLandmark">State</label>
                    <input type="text" id="modalAddressState" name="state" class="form-control"
                        placeholder="Ex. Gujarat">
                    @error('state')
                        <span class="fv-plugins-message-container invalid-feedback" role="alert" style="display:block;">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-12 col-md-6">
                    <label class="form-label" for="modalAddressZipCode">Pin Code</label>
                    <input type="text" id="modalAddressZipCode" name="pincode" class="form-control"
                        placeholder="Ex. 380058">
                    @error('pincode')
                        <span class="fv-plugins-message-container invalid-feedback" role="alert" style="display:block;">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-12 text-center mt-4">
                    <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                    <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
