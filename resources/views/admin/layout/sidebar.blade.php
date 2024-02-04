<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

    <div class="app-brand demo">
        <a href="#" class="app-brand-link">
            <span class="app-brand-logo demo mt-1">
                <img src="{{ asset('assets/img/favicon/logo-black.png') }}" alt="viewlytics image" width="32"
                    height="32">
            </span>
            <span class="app-brand-text demo menu-text fw-bold ms-2 " style="color: black">ShoeSmasher</span>
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="bx menu-toggle-icon d-none d-xl-block fs-4 align-middle ms-2 mt-2" style="color: black"></i>
            <i class="bx bx-x d-block d-xl-none bx-sm align-middle mt-2" style="color: black"></i>
        </a>
    </div>
    <div class="menu-divider mt-0"></div>
    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1 overflow-auto">
        <!-- Apps & Pages -->
        <li class="menu-item">
            <a href="#" class="menu-link">
                <i class="menu-icon tf-icons fa-solid fa-house-chimney-window fs-6"></i>
                <div class="align-middle">{{ __('Dashboard') }}</div>
            </a>
        </li>

        <li class="menu-item">
            <a href="{{ route('shoes.index') }}" class="menu-link">
                <i class="menu-icon tf-icons fa-solid fa-cubes fs-6"></i>
                <div class="align-middle">{{ __('Shoes Collection') }}</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('customers.index') }}" class="menu-link">
                <i class="menu-icon tf-icons fa-solid fa-users fs-6"></i>
                <div class="align-middle">{{ __('Customers') }}</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('orders.index') }}" class="menu-link">
                <i class="menu-icon tf-icons fa-solid fa-cart-shopping fs-6"></i>
                <div class="align-middle">{{ __('Orders') }}</div>
            </a>
        </li>
        {{-- <li class="menu-item">
            <a href="{{ route('general-settings.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-cog"></i>
                <div data-i18n="Calendar">{{ __('General Settings') }}</div>
            </a>
        </li> --}}

        {{-- @can('sidebar-role')
            <li class="menu-item ">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-check-shield"></i>
                    <div>{{ __('Management') }}</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item ">
                        <a href="{{ route('roles.index') }}" class="menu-link">
                            <div>{{ __('Roles') }}</div>
                        </a>
                    </li>

                    <li class="menu-item ">
                        <a href="{{ route('users.index') }}" class="menu-link">
                            <div>{{ __('Users') }}</div>
                        </a>
                    </li>
                </ul>
            @endcan
        </li> --}}
    </ul>
</aside>
