@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Admin Dashboard</h1>
    <p>Welcome to your dashboard, {{ auth()->guard('admin')->user()->name }}!</p>
    <!-- Add your dashboard content here -->
    <div class="row">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Users</h5>
                    <p class="card-text">123</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Active Projects</h5>
                    <p class="card-text">45</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-danger mb-3">
                <div class="card-body">
                    <h5 class="card-title">Pending Tasks</h5>
                    <p class="card-text">7</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
