@extends('superadmin.layouts.auth')

@section('content')
    <!-- Sign In Start -->
    <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
            <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                @include('superadmin.layouts.inc.alerts')
                <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                    <div class="row align-items-center justify-content-between mb-3">
                        <a href="{{ route('superadmin.login') }}" class="col-6">
                            {!! site_logo('w-75 h-50') !!}
                        </a>
                        <h3 class="col-6">Sign In</h3>
                    </div>

                    <form method="POST" action="{{ route('superadmin.login') }}">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                            <label for="floatingPassword">Password</label>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                            </div>
                            <a href="#">Forgot Password?</a>
                        </div>
                        <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Sign In</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Sign In End -->
@endsection
