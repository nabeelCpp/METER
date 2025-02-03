@extends('superadmin.layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="mb-4">Edit Admin</h1>

            <!-- Include Alert Partial -->
            @include('superadmin.layouts.inc.alerts')

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('superadmin.admins.update', $admin->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Name Field -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Enter full name" value="{{ old('name', $admin->name) }}" required>
                        </div>

                        <!-- Email Field -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Enter email address" value="{{ old('email', $admin->email) }}" required>
                        </div>

                        <!-- Phone Field -->
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="text" id="phone" name="phone" class="form-control" placeholder="Enter phone number" value="{{ old('phone', $admin->phone) }}">
                        </div>

                        <!-- Status Field -->
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" id="status" class="form-control">
                                @foreach ($admin_statuses as $key => $item)
                                    <option value="{{ $key }}" {{ old('status', $admin->status) == $key ? 'selected' : '' }}>{{$item}}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Password Field (optional update) -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password <small class="text-muted">(Leave blank to keep current password)</small></label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Enter new password">
                        </div>

                        <!-- Password Confirmation Field -->
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Confirm new password">
                        </div>

                        <!-- Profile Picture (optional) -->
                        <div class="mb-3">
                            <label for="profile_picture" class="form-label">Profile Picture (optional)</label>
                            <input type="file" id="profile_picture" name="profile_picture" class="form-control">
                            @if($admin->profile_picture)
                                <div class="mt-2">
                                    <img src="{{ asset($admin->profile_picture) }}" alt="Profile Picture" style="height: 80px;">
                                </div>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary">Update Admin</button>
                        <a href="{{ route('superadmin.admins.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
