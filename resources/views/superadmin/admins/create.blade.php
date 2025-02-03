@extends('superadmin.layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="mb-4">Add New Admin</h1>

            <!-- Display Validation Errors -->
            @include('superadmin.layouts.inc.alerts')

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('superadmin.admins.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Name Field -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Enter full name" value="{{ old('name') }}" required>
                        </div>

                        <!-- Email Field -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Enter email address" value="{{ old('email') }}" required>
                        </div>

                        <!-- Phone Field -->
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="text" id="phone" name="phone" class="form-control" placeholder="Enter phone number" value="{{ old('phone') }}">
                        </div>

                        <!-- Password Field -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Enter password" required>
                        </div>

                        <!-- Password Confirmation Field -->
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Confirm password" required>
                        </div>

                        <!-- Profile Picture (optional) -->
                        <div class="mb-3">
                            <label for="profile_picture" class="form-label">Profile Picture (optional)</label>
                            <input type="file" id="profile_picture" name="profile_picture" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary">Create Admin</button>
                        <a href="{{ route('superadmin.admins.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
