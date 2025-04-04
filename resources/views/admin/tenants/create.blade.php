@extends('admin.layouts.master')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card card-plain">
                <div class="card-header">
                    <h4 class="font-weight-bolder">{{ __('admin.Add Tenant') }}</h4>
                    <p class="mb-0">{{ __('admin.Enter tenant details to create a new tenant') }}</p>
                </div>
                <div class="card-body">
                    @include('admin.layouts.inc.alerts')
                    <x-admin.form-component
                        :action="isset($tenant) ? route('admin.tenants.update', $tenant) : route('admin.tenants.store')"
                        :method="isset($tenant) ? 'PUT' : 'POST'"
                        :fields="[
                            'first_name' => ['label' => __('admin.First Name'), 'type' => 'text', 'required' => true],
                            'last_name' => ['label' => __('admin.Last Name'), 'type' => 'text'],
                            'email' => ['label' => __('admin.Email'), 'type' => 'email', 'required' => true],
                            'phone' => ['label' => __('admin.Phone'), 'type' => 'text', 'required' => true],
                            'gender' => ['label' => __('admin.Gender'), 'type' => 'select', 'options' => ['male' => 'Male', 'female' => 'Female', 'other' => 'Other']],
                            'nationality' => ['label' => __('admin.Nationality'), 'type' => 'text'],
                            'address' => ['label' => __('admin.Address'), 'type' => 'text'],
                            'aqama_cnic_id' => ['label' => __('admin.Aqama/CNIC'), 'type' => 'text', 'required' => true],
                            'aqama_expiry_date' => ['label' => __('admin.Aqama Expiry Date'), 'type' => 'date', 'required' => true],
                            'password' => ['label' => __('admin.Password'), 'type' => 'password', 'required' => true],
                            'password_confirmation' => ['label' => __('admin.Confirm Password'), 'type' => 'password', 'required' => true],
                            'nafath_verified' => ['label' => __('admin.Nafath Verified'), 'type' => 'checkbox'],
                        ]"
                        :submitText="isset($tenant) ? __('admin.Update Tenant') : __('admin.Add Tenant')"
                        :model="$tenant ?? null"
                    />
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
