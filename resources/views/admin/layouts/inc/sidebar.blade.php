<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3  
    @if($direction == 'rtl') fixed-end me-3 rotate-caret @else fixed-start ms-3  @endif bg-gradient-dark"
    id="sidenav-main">

    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{ route('admin.dashboard') }}">
            <img src="{{ admin_asset() }}/assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold text-white">{{ project_name() }}</span>
        </a>
    </div>

    <hr class="horizontal light mt-0 mb-2">

    <div class="collapse navbar-collapse w-auto max-height-vh-100" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <!-- Dashboard -->
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->routeIs('admin.dashboard') ? 'active bg-gradient-primary' : '' }}"
                   href="{{ route('admin.dashboard') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-desktop"></i>
                    </div>
                    <span class="nav-link-text ms-1">{{ __('admin.Dashboard') }}</span>
                </a>
            </li>

            <!-- Owners (Resource Controller) -->
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->routeIs('admin.owners.*') ? 'active bg-gradient-primary' : '' }}"
                   href="{{ route('admin.owners.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-users"></i>
                    </div>
                    <span class="nav-link-text ms-1">{{ __('admin.Owners') }}</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->routeIs('admin.buildings.*') || request()->routeIs('admin.apartments.*') ? 'active bg-gradient-primary' : '' }}"
                   data-bs-toggle="collapse" href="#buildingsMenu" role="button" aria-expanded="false" aria-controls="buildingsMenu">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-building"></i>
                    </div>
                    <span class="nav-link-text ms-1">{{ __('admin.Buildings') }}</span>
                </a>
                <div class="collapse {{ request()->routeIs('admin.buildings.*') || request()->routeIs('admin.apartments.*') ? 'show' : '' }}" id="buildingsMenu">
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item">
                            <a class="nav-link text-white {{ request()->routeIs('admin.buildings.*') ? 'active bg-gradient-primary' : '' }}"
                               href="{{ route('admin.buildings.index') }}">
                               <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                    <i class="fa fa-city"></i>
                                </div>{{ __('admin.All Buildings') }}
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link text-white {{ request()->routeIs('admin.apartments.*') ? 'active bg-gradient-primary' : '' }}"
                               href="{{ route('admin.apartments.index') }}">
                               <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                    <i class="fa fa-door-open"></i>
                                </div>{{ __('admin.Apartments') }}
                            </a>
                        </li> --}}
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->routeIs('admin.tenants.*') ? 'active bg-gradient-primary' : '' }}"
                   href="{{ route('admin.tenants.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-users"></i>
                    </div>
                    <span class="nav-link-text ms-1">{{ __('admin.Tenants') }}</span>
                </a>
            </li>

        </ul>
    </div>
</aside>
