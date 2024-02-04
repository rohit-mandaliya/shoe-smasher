<!DOCTYPE html>
<html lang="en" id='main_page_layout' class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="{{ asset('assets') }}" data-template="horizontal-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>ShoeSmasher</title>

    <meta name="description" content="" />

    <style>
        .active {
            font-weight: 700
        }

        .rate {
            float: left;
            height: 46px;
            padding: 0 0px;
        }

        .rate:not(:checked)>input {
            position: absolute;
            top: -9999px;
        }

        .rate:not(:checked)>label {
            float: right;
            width: 1em;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 40px;
            color: #ccc;
            margin-top: -8px;
        }

        .rate:not(:checked)>label:before {
            content: '★ ';
        }

        .rate>input:checked~label {
            color: #ffc700;
        }

        .rate:not(:checked)>label:hover,
        .rate:not(:checked)>label:hover~label {
            color: #deb217;
        }
    </style>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/logo-black.png') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hammersmith+One&family=Lato&family=Righteous&display=swap" rel="stylesheet">
    {{-- <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" /> --}}

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/flag-icons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/css/rtl/core.css') }}"
        class="template-customizer-core-css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/css/rtl/theme-default.css') }}"
        class="template-customizer-theme-css">
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/typeahead-js/typeahead.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />

    <!-- Page CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/rateyo/rateyo.css') }}" />

    @yield('css')
    <!-- Helpers -->
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="{{ asset('assets/vendor/js/template-customizer.js') }}"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('assets/js/config.js') }}"></script>

    <style>
        .h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6{
            font-family:'Hammersmith One', sans-serif;
        }

        *{
            font-family: 'Lato', sans-serif;
        }
    </style>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-navbar-full layout-horizontal layout-without-menu">
        <div class="layout-container">
            {{-- Add Review Modal --}}
            <div class="modal fade" id="addReview" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addRoleModalId">{{ __('Rate Us') }}</h5>
                        </div>
                        <div class="modal-body">
                            <form action="#" method="POST" id='reviewForm'>
                                @csrf <div class="row">
                                    <div class="col mb-3">

                                        <div class="rate">
                                            @for ($i = 5; $i >= 1; $i--)
                                                <input type="radio" id="star{{ $i }}" name="stars"
                                                    value="{{ $i }}" />
                                                <label for="star{{ $i }}"></label>
                                            @endfor
                                        </div>
                                        <br><br>

                                        @error('stars')
                                            <span class="fv-plugins-message-container invalid-feedback" role="alert"
                                                style="display:block;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <strong id="stars-error" class="fv-plugins-message-container invalid-feedback"
                                            for="stars" role="alert" style="display:block;"></strong>
                                        <br>

                                        <div class="mb-3">
                                            <textarea name='description' maxlength="150" id="description" class="form-control" placeholder="Write a Review"></textarea>
                                            @error('description')
                                                <span class="fv-plugins-message-container invalid-feedback" role="alert"
                                                    style="display:block;">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <strong id="description_error"
                                                class="fv-plugins-message-container invalid-feedback" for="stars"
                                                role="alert" style="display:block;"></strong>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger"
                                data-bs-dismiss="modal">{{ __('Close') }}</button>
                            <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- /Add Role Model --}}
            <!-- Navbar -->
            @include('customer.layouts.header')
            <!-- / Navbar -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Menu -->
                    {{-- @if (Auth::guard('agency')->user())
                        @include('agency.layouts.sidebar')
                    @endif --}}
                    <!-- / Menu -->

                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        @if (session()->has('success_customer'))
                            <div class="alert alert-primary alert-dismissible d-flex align-items-center"
                                role="alert">
                                <i class="bx bx-xs bx-check-circle me-2"></i>
                                {{ session()->get('success_customer') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        @if (session()->has('failure_customer'))
                            <div class="alert alert-danger alert-dismissible d-flex align-items-center"
                                role="alert">
                                <i class="bx bx-xs bx-radiation me-2"></i>
                                {{ session()->get('failure_customer') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        {{-- <div class="row"> --}}
                        <!-- Website Analytics-->
                        @yield('content')
                        {{-- </div> --}}

                    </div>
                    <!--/ Content -->

                    <!-- Footer -->
                    <footer class="content-footer footer bg-footer">
                        <div
                            class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                            <div class="text-center mt-4">
                                @if(Auth::guard('customer')->user())
                                    <a type="button" class="btn btn-outline-secondary" data-bs-toggle='modal'
                                        data-bs-target="#addReview">
                                        {{ __('Leave Us Review') }}
                                    </a>
                                    @else
                                    ©
                                    <script>
                                        document.write(new Date().getFullYear());
                                    </script>
                                    <a href="#" class="footer-link fw-semibold mt-2"
                                        style="color:#516377">ShoeSmasher</a>.
                                    {{ __('All rights reserved.') }}
                                    @endif
                            </div>
                            <div class=" mt-2">
                                <span class="footer-img">
                                </span>
                            </div>
                            <div class="text-center mt-3">
                                <a type="button" href="https://www.facebook.com/shoesmasher"
                                    class="btn btn-icon rounded-pill btn-facebook" target="_blank">
                                    <i class="tf-icons bx bxl-facebook"></i>
                                </a>
                                <a type="button" href="https://twitter.com/shoesmasher"
                                    class="btn btn-icon rounded-pill btn-github" target="_blank">
                                    <i class="tf-icons bx bxl-twitter"></i>
                                </a>
                                <a type="button" href="https://instagram.com/shoesmasher"
                                    class="btn btn-icon rounded-pill btn-pinterest" target="_blank">
                                    <i class="tf-icons bx bxl-instagram"></i>
                                </a>
                            </div>
                        </div>
                    </footer>
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!--/ Content wrapper -->
            </div>

            <!--/ Layout container -->
        </div>
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>

    <!-- Drag Target Area To SlideIn Menu On Small Screens -->
    <div class="drag-target"></div>

    <!--/ Layout wrapper -->
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/hammer/hammer.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/i18n/i18n.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/typeahead-js/typeahead.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('assets/js/pages-auth-two-steps.js') }}"></script>
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
    <script src="{{ asset('assets/js/forms-selects.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/rateyo/rateyo.js') }}"></script>
    <script src="{{ asset('assets/js/extended-ui-star-ratings.js') }}"></script>

    @yield('scripts')

    <script>
        $(document).ready(function() {

            let url = window.location.href;
            $('a.nav-link').filter(function() {
                let a_route = $(this).attr('href');
                if (url == a_route) {
                    $(this).addClass('active');
                    $(this).parent().addClass('active');
                    $(this).parent().parent().parent().addClass('open');
                }
            });
            $('a.menu-link').filter(function() {
                let a_route = $(this).attr('href');
                if (url == a_route) {
                    $(this).addClass('active');
                    $(this).parent().addClass('active');
                }
            })

            if ($('#main_page_layout').hasClass('light-style')) {
                $('.app-brand-link').append(
                    '<img src="{{ asset('assets/img/favicon/logo-black.png') }}" height="60" width="60"><img src="{{ asset('assets/img/favicon/logo_text_black.png') }}" height="60" width="150">');
                $('.footer-img').append(
                    '<img src="{{ asset('assets/img/favicon/logo-black.png') }}" height="60" width="60"><img src="{{ asset('assets/img/favicon/logo_text_black.png') }}" height="60" width="150">');
                $('.footer-img').parent().addClass('text-center');
                $('#login-logo').append('<img src="{{ asset('assets/img/favicon/logo-black.png') }}" width="32" height="32">');
                $('.logged-logo').append('<img src="{{ asset('assets/img/favicon/logo-black.png') }}" class="rounded-circle" />');
            } else {
                $('.app-brand-link').append(
                    '<img src="{{ asset('assets/img/favicon/logo-white.png') }}" height="60" width="60"><img src="{{ asset('assets/img/favicon/logo_text_white.png') }}" height="60" width="150">');
                $('.footer-img').append(
                    '<img src="{{ asset('assets/img/favicon/logo-white.png') }}" height="60" width="60"><img src="{{ asset('assets/img/favicon/logo_text_white.png') }}" height="60" width="150">');
                $('.footer-img').parent().addClass('text-center');
                $('#login-logo').append('<img src="{{ asset('assets/img/favicon/logo-white.png') }}" width="32" height="32">');
                $('.logged-logo').append('<img src="{{ asset('assets/img/favicon/logo-white.png') }}" class="rounded-circle" />');
            }

            $('#reviewForm').submit(function() {
                if ($('input[name="stars"]:checked').length == 0) {
                    $('#stars-error').html('Select stars first');
                    return false;
                } else if ($('#description').val() == '') {
                    $('#description_error').html('Write few words to review');
                    return false;
                } else {
                    $('#stars-error').html('');
                    $('#description_error').html('');
                }
            });
        });
    </script>
</body>

</html>
