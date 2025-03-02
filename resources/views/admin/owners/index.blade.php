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
                            <h6 class="text-white text-capitalize ps-3">{{ __('admin.Owners List') }}</h6>
                            <a href="{{ route('admin.owners.create') }}" class="btn bg-gradient-dark mb-0">
                                <i class="material-icons text-sm">add</i>&nbsp;&nbsp; {{ __('admin.Add Owner') }}
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
                                __('admin.Status'),
                            ]" :data="$owners"
                            :columns="[
                                'first_name' => fn($owner) => $owner->first_name,
                                'last_name' => fn($owner) => $owner->last_name,
                                'email' => fn($owner) => $owner->email,
                                'phone' => fn($owner) => $owner->phone,
                                'aqama_cnic' => fn($owner) => $owner->aqama_cnic_id.' <i class=\'fa fa-'.($owner->nafath_verified?'check text-success':'times text-danger').'\' title=\''.__('admin.Nafath Verification Status').'\'></i><p class=\'text-xs text-secondary\'>Expiry: <b>'.format_date($owner->aqama_expiry_date).'</b></p>',
                                'status' => fn($owner) => view('components.status-badge', ['status' => $owner->status])->render(),
                            ]"
                            :actions="[
                                [
                                    'label' => __('admin.View'),
                                    'icon' => 'fa fa-eye',
                                    'class' => 'btn-primary',
                                    'url' => fn($owner) => route('admin.owners.show', $owner),
                                ],
                                [
                                    'label' => __('admin.Edit'),
                                    'icon' => 'fa fa-edit',
                                    'class' => 'btn-info',
                                    'url' => fn($owner) => route('admin.owners.edit', $owner),
                                ],
                                [
                                    'label' => __('admin.Delete'),
                                    'icon' => 'fa fa-trash',
                                    'class' => 'btn-danger',
                                    // 'url' => fn($owner) => route('admin.owners.destroy', $owner),
                                    'onclick' => fn($owner) => 'confirmDelete(\''. route('admin.owners.destroy', $owner).'\', \'' . __('admin.Delete Owner?') . '\')',

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
