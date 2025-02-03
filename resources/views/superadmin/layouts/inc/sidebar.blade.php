<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="{{ route('superadmin.dashboard') }}" class="navbar-brand mx-4 mb-3">
            {!! site_logo() !!}
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="{{ superadmin_asset('img/user.jpg') }}" alt="" style="width: 40px; height: 40px;">
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">{{ auth()->guard('superadmin')->user()->name }}</h6>
                <span>Super Admin</span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="{{ route('superadmin.dashboard') }}" class="nav-item nav-link {{ Request::is('superadmin') ? 'active' : '' }}">
                <i class="fa fa-tachometer-alt me-2"></i>Dashboard
            </a>
            <a href="{{ route('superadmin.admins.index') }}" class="nav-item nav-link {{ Request::is('superadmin/admins*') ? 'active' : '' }}">
                <i class="fa fa-users me-2"></i>Manage Admins
            </a>
            <a href="#" class="nav-item nav-link"><i class="fa fa-user-tie me-2"></i>Manage Owners</a>
            <a href="#" class="nav-item nav-link"><i class="fa fa-user me-2"></i>Manage Tenants</a>
            <a href="#" class="nav-item nav-link"><i class="fa fa-building me-2"></i>Properties</a>
            <a href="#" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Reports</a>
            <a href="#" class="nav-item nav-link"><i class="fa fa-cogs me-2"></i>Settings</a>
        </div>
    </nav>
</div>
