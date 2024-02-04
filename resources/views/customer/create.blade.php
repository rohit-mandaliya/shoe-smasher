@extends('customer.layouts.main')
@section('content')
    <div class="container-xxl" style="max-width: 30rem;">

        <div class=" authentication-basic container-p-y" style="min-height: 80vh">
            <div class="authentication-inner py-4">
                <!-- Register Card -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <a href="#" class="app-brand-link gap-2">

                            </a>
                        </div>
                        <!-- /Logo -->
                        <h4 class="mb-2 mt-4">{{ __('Adventure starts here ') }}🚀</h4>

                        <p class="mb-4">{{ __('Make your account with easy steps.') }}</p>

                        <form id="registerForm" class="mb-3" action="{{ route('customer.register') }}"
                            method="POST">
                            @csrf
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Name') }}</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        placeholder="First Name" onkeypress="return /[a-z ]/i.test(event.key)"
                                        value="{{ old('name') }}" maxlength="20" >
                                    @error('name')
                                        <span class="fv-plugins-message-container invalid-feedback" role="alert"
                                            style="display:block;">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    @if (session('error'))
                                        <span class="invalid-feedback" role="alert" style="display:block;">
                                            <strong>{{ session('error') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">{{ __('Email') }}</label>
                                    <input type="email" style="text-transform: lowercase;" name="email" maxlength="50"
                                        class="form-control" onkeydown="return (event.keyCode!=32);" value="{{ old('email') }}" placeholder="example@gmail.com"
                                        required>
                                    @error('email')
                                        <span class="fv-plugins-message-container invalid-feedback" role="alert"
                                            style="display:block;">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    @if (session('error'))
                                        <span class="invalid-feedback" role="alert" style="display:block;">
                                            <strong>{{ session('error') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">{{ __('Phone') }}</label>
                                    <input type="text" name="phone" maxlength="15"
                                        class="form-control" onkeypress="return /[0-9]/i.test(event.key)" value="{{ old('email') }}" placeholder="98XXXXXXXX"
                                        required>
                                    @error('phone')
                                        <span class="fv-plugins-message-container invalid-feedback" role="alert"
                                            style="display:block;">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    @if (session('error'))
                                        <span class="invalid-feedback" role="alert" style="display:block;">
                                            <strong>{{ session('error') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="mb-3 form-password-toggle">
                                    <label class="form-label" for="password">{{ __('Password') }}</label>
                                    <div class="input-group input-group-merge">
                                        <input class="form-control" maxlength="20"
                                            onkeypress="return /[a-z0-9@$#&]/i.test(event.key)" type="password"
                                            name="password" placeholder="············">
                                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                    </div>
                                    @error('password')
                                        <span class="fv-plugins-message-container invalid-feedback" role="alert"
                                            style="display:block;">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    @if (session('error'))
                                        <span class="invalid-feedback" role="alert" style="display:block;">
                                            <strong>{{ session('error') }}</strong>
                                        </span>
                                    @endif
                                </div>

                            <button class="btn btn-primary d-grid w-100">{{ __('Sign up') }}</button>
                        </form>

                        <p class="text-center">
                            <span>{{ __('Already have an account?') }}</span>
                            <a href="{{ route('customer.login-page-customer') }}">
                                <span>{{ __('Sign in instead') }}</span>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            <!-- Register Card -->
        </div>
    </div>
    @endsection
    @section('scripts')
    {!! JsValidator::formRequest('App\Http\Requests\Customer\AddCustomerRequest', '#registerForm') !!}
    <script src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
    @endsection
