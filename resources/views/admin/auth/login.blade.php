@extends('admin.layouts.auth')
@section('content')
    <div class="container my-auto">
        <div class="row">
            <div class="col-lg-4 col-md-8 col-12 mx-auto">

                @include('admin.layouts.inc.alerts')
                <div class="card z-index-0 fadeIn3 fadeInBottom">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                            <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Sign in</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form role="form" class="text-start" action="{{ route('admin.login.submit') }}" method="POST">
                            @csrf
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                            </div>
                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <div class="form-check form-switch d-flex align-items-center mb-3">
                                <input class="form-check-input" type="checkbox" id="rememberMe">
                                <label class="form-check-label mb-0 ms-2" for="rememberMe">Remember me</label>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Sign in</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
