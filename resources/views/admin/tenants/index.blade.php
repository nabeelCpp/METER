@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                @include('admin.layouts.inc.alerts')
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div
                            class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between align-items-center">
                            <h6 class="text-white text-capitalize ps-3">{{ __('admin.Tenants List') }}</h6>
                            <a href="{{ route('admin.tenants.create') }}" class="btn bg-gradient-dark mb-0">
                                <i class="material-icons text-sm">add</i>&nbsp;&nbsp; {{ __('admin.Add Tenant') }}
                            </a>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <x-admin.table-component :headers="[
                                __('admin.First Name'),
                                __('admin.Last Name'),
                                __('admin.Email'),
                                __('admin.Phone'),
                                __('admin.Aqama/CNIC'),
                            ]" :data="$tenants"
                            :columns="[
                                'first_name' => fn($tenant) => $tenant->first_name,
                                'last_name' => fn($tenant) => $tenant->last_name,
                                'email' => fn($tenant) => $tenant->email,
                                'phone' => fn($tenant) => $tenant->phone,
                                'aqama_cnic' => fn($tenant) => $tenant->aqama_cnic_id.' <i class=\'fa fa-'.($tenant->nafath_verified?'check text-success':'times text-danger').'\' title=\''.__('admin.Nafath Verification Status').'\'></i><p class=\'text-xs text-secondary\'>Expiry: <b>'.format_date($tenant->aqama_expiry_date).'</b></p>',
                                // 'status' => fn($tenant) => view('components.status-badge', ['status' => $tenant->status])->render(),
                            ]"
                            :actions="[
                                [
                                    'label' => __('admin.View'),
                                    'icon' => 'fa fa-eye',
                                    'class' => 'btn-primary',
                                    'url' => fn($tenant) => route('admin.tenants.show', $tenant),
                                ],
                                [
                                    'label' => __('admin.Edit'),
                                    'icon' => 'fa fa-edit',
                                    'class' => 'btn-info',
                                    'url' => fn($tenant) => route('admin.tenants.edit', $tenant),
                                ],
                                [
                                    'label' => __('admin.Delete'),
                                    'icon' => 'fa fa-trash',
                                    'class' => 'btn-danger',
                                    // 'url' => fn($tenant) => route('admin.tenants.destroy', $tenant),
                                    'onclick' => fn($tenant) => 'confirmDelete(\''. route('admin.tenants.destroy', $tenant).'\', \'' . __('admin.Delete Tenant?') . '\')',

                                ]
                            ]"
                            :pagination="true"
                            :showIndex="true" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.layouts.inc.delete-modal')
@endsection
