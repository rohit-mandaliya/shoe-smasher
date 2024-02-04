<nav class="layout-navbar navbar navbar-expand-xl align-items-center bg-navbar-theme" id="layout-navbar">
    <div class="container-xxl">
        <div class="navbar-brand app-brand demo d-none d-xl-flex py-0 me-4">
            <a href="{{ route('customer_index') }}" class="app-brand-link gap-2">
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-xl-none">
                <i class="bx bx-x bx-sm align-middle"></i>
            </a>
        </div>
        <div class="navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a href="{{ route('customer_index') }}" class="nav-item nav-link px-0 me-xl-4" id="login-logo">
            </a>
        </div>

        <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <ul class="navbar-nav flex-row align-items-center ms-auto">
                <li class="nav-item me-2 me-xl-0">
                    <a class="nav-link style-switcher-toggle hide-arrow" href="javascript:void(0);">
                        <i class="bx bx-sm bx-moon"></i>
                    </a>
                </li>
                <li class="nav-item navbar-search-wrapper me-2 me-xl-0 "><a class="nav-link nav-link-search pt-2"
                        href="{{ route('customer.collection') }}" aria-describedby="Shoes Collection"
                        title="Shoes Collection">&nbsp;&nbsp;&nbsp;<i class="fa-solid fa-shoe-prints"></i>
                    </a>
                </li>
                <li class="nav-item navbar-search-wrapper me-2 me-xl-0 "><a class="nav-link nav-link-search pt-2"
                        href="{{ route('customer.addToCartPage') }}" title="Your Cart">&nbsp;&nbsp;&nbsp;<i
                            class="fa-solid fa-cart-shopping"></i>
                    </a>
                </li>
                @if (!Auth::guard('customer')->user())
                    <li class="nav-item navbar-search-wrapper me-2 me-xl-0"><a class="nav-link nav-link-search pt-2"
                            href="{{ route('customer.login-page-customer') }}" title="Sign In">&nbsp;&nbsp;&nbsp;<i
                                class="fa-solid fa-power-off"></i>
                        </a>
                    </li>
                @endif
                @if (Auth::guard('customer')->user())
                    <!-- User -->
                    <li class="nav-item navbar-dropdown dropdown-user dropdown">
                        <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                            data-bs-toggle="dropdown">
                            <div class="avatar avatar-online logged-logo">
                                &nbsp;&nbsp;
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="#">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 me-3">
                                            <div class="avatar avatar-online logged-logo">

                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <span
                                                class="fw-semibold d-block lh-1">{{ Auth::guard('customer')->user()->name }}</span>
                                            <small>{{ Auth::guard('customer')->user()->email }}</small>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="dropdown-divider"></div>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    <i class="bx bx-user me-2"></i>
                                    <span class="align-middle">{{ __('My Profile') }}</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('customer.logout-customer') }}">
                                    <i class="bx bx-power-off me-2"></i>
                                    <span class="align-middle">{{ __('Log Out') }}</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!--/ User -->
                @endif
                <!--/ Notification -->
            </ul>
        </div>

        <!-- Search Small Screens -->
        <div class="navbar-search-wrapper search-input-wrapper container-xxl d-none">
            <input type="text" class="form-control search-input border-0" placeholder="Search..."
                aria-label="Search..." />
            <i class="bx bx-x bx-sm search-toggler cursor-pointer"></i>
        </div>
    </div>
</nav>
