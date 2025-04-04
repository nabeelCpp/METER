@extends('admin.layouts.master')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header bg-gradient-primary">
                    <h4 class="text-white mb-0">{{ __('admin.Tenant Details') }}</h4>
                </div>

                <div class="card-body">
                    <div class="row">
                        {{-- Profile Picture --}}
                        <div class="col-md-4 text-center">
                            <img src="{{ $tenant->profile_picture ? asset('storage/' . $tenant->profile_picture) : admin_asset('assets/img/default-avatar.png') }}"
                                 class="img-fluid rounded-circle mb-3" style="width: 120px; height: 120px;" alt="Profile Picture">

                            <h5 class="mb-1">{{ $tenant->first_name }} {{ $tenant->last_name }}</h5>
                            <p class="text-muted">{{ $tenant->email }}</p>
                            <span class="badge bg-gradient-{{ $tenant->nafath_verified ? 'success' : 'warning' }}">
                                {{ $tenant->nafath_verified ? __('admin.Verified') : __('admin.Pending Verification') }}
                            </span>
                        </div>

                        {{-- Details --}}
                        <div class="col-md-8">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <strong>{{ __('admin.Phone') }}:</strong> {{ $tenant->phone }}
                                </li>
                                <li class="list-group-item">
                                    <strong>{{ __('admin.Gender') }}:</strong> {{ ucfirst($tenant->gender ?? '-') }}
                                </li>
                                <li class="list-group-item">
                                    <strong>{{ __('admin.Nationality') }}:</strong> {{ $tenant->nationality ?? '-' }}
                                </li>
                                <li class="list-group-item">
                                    <strong>{{ __('admin.Address') }}:</strong> {{ $tenant->address ?? '-' }}
                                </li>
                                <li class="list-group-item">
                                    <strong>{{ __('admin.Aqama/CNIC') }}:</strong> {{ $tenant->aqama_cnic_id }}
                                </li>
                                <li class="list-group-item">
                                    <strong>{{ __('admin.Aqama Expiry Date') }}:</strong>
                                    {{ \Carbon\Carbon::parse($tenant->aqama_expiry_date)->format('d M, Y') }}
                                </li>
                                <li class="list-group-item">
                                    <strong>{{ __('admin.Status') }}:</strong>
                                    <span class="badge bg-gradient-{{ $tenant->nafath_verified ? 'success' : 'warning' }}">
                                        {{ $tenant->nafath_verified ? __('admin.Verified') : __('admin.Pending') }}
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="card-footer text-center">
                    <a href="{{ route('admin.tenants.index') }}" class="btn btn-secondary">
                        <i class="fa fa-arrow-left me-1"></i> {{ __('admin.Back') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
