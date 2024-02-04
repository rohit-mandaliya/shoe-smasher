@extends('customer.layouts.main')
@section('content')
    <div class="container-xxl" style="max-width: 30rem;">
        <div class="authentication-basic container-p-y" style="min-height: 80vh">
            <div class="authentication-inner py-4">
                <!-- Register -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <a href="#" class="app-brand-link gap-2">
                            </a>
                        </div>
                        <!-- /Logo -->
                        <h4 class="mb-2 mt-4">{{ __('Welcome to ShoeSmasher!') }} 👋</h4>
                        <p class="mb-4">{{ __('Please sign-in to your account and start the adventure') }}</p>
                        <!-- Session Messages -->
                        @if (session()->has('success'))
                            <div class="alert alert-primary alert-dismissible d-flex align-items-center" role="alert">
                                <i class="bx bx-xs bx-check-circle me-2"></i>
                                {{ session()->get('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        @if (session()->has('failure'))
                            <div class="alert alert-danger alert-dismissible d-flex align-items-center" role="alert">
                                <i class="bx bx-xs bx-radiation me-2"></i>
                                {{ session()->get('failure') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <form action="{{ route('customer.login-customer') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">{{ __('Email') }}</label>
                                <input type="text" class="form-control" maxlength="50" id="email" name="email"
                                    placeholder="Enter your email" autofocus />
                                @error('email')
                                    <span class="fv-plugins-message-container invalid-feedback" role="alert"
                                        style="display:block;">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="password">{{ __('Password') }}</label>

                                </div>
                                <div class="input-group input-group-merge">
                                    <input type="password" maxlength="20" id="password" class="form-control"
                                        name="password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                                @error('password')
                                    <span class="fv-plugins-message-container invalid-feedback" role="alert"
                                        style="display:block;">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" type="submit">{{ __('Sign in') }}</button>
                            </div>
                        </form>

                        <p class="text-center">
                            <span>{{ __('New on our platform?') }}</span>
                            <a href="{{ route('customer.create') }}">
                                <span>{{ __('Create an account') }}</span>
                            </a>
                        </p>
                    </div>
                </div>
                <!-- /Register -->
            </div>
        </div>
    </div>
@endsection
