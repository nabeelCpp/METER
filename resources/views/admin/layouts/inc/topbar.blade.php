
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
    navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
        <div class="collapse navbar-collapse mt-sm-0 mt-2 px-0  collapse navbar-collapse mt-sm-0 mt-2 @if($direction == 'rtl') px-0 @else me-md-0 me-sm-4 @endif" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <div class="input-group input-group-outline">
                    <label class="form-label">{{ __('admin.Type here...') }}</label>
                    <input type="text" class="form-control">
                </div>
            </div>
            <ul class="navbar-nav  justify-content-end">
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link" data-bs-toggle="dropdown">
                        <i class="fa fa-user me-lg-2"></i>
                        <span class="d-none d-lg-inline-flex">{{ auth()->guard('admin')->user()->name }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                        <a href="#" class="dropdown-item">{{__('admin.My Profile')}}</a>
                        <a href="#" class="dropdown-item">{{__('admin.Settings')}}</a>
                        <form method="POST" action="{{ route('admin.logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item">{{__('admin.Logout')}}</button>
                        </form>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link" data-bs-toggle="dropdown">
                        <i class="fa fa-globe me-lg-2"></i>
                        <span class="d-none d-lg-inline-flex">{{ app()->getLocale() == 'ar' ? 'العربية' : 'English' }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                        <a href="{{ route('lang.switch', 'en') }}" class="dropdown-item">English</a>
                        <a href="{{ route('lang.switch', 'ar') }}" class="dropdown-item">العربية</a>
                    </div>
                </div>
                <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
