@extends('superadmin.layouts.master')

@section('content')
    <div class="container-fluid">
        <h1 class="mb-4">Super Admin Dashboard</h1>
        <div class="row">
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-users fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Total Admins</p>
                        <h6 class="mb-0">5</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-user-tie fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Total Owners</p>
                        <h6 class="mb-0">12</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-user fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Total Tenants</p>
                        <h6 class="mb-0">58</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-building fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Total Properties</p>
                        <h6 class="mb-0">25</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
