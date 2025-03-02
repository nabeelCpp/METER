

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
                            <h6 class="text-white text-capitalize ps-3">{{ __('admin.Buildings List') }}</h6>
                            <a href="{{ route('admin.buildings.create') }}" class="btn bg-gradient-dark mb-0">
                                <i class="material-icons text-sm">add</i>&nbsp;&nbsp; {{ __('admin.Add New Building') }}
                            </a>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <x-admin.table-component
                            :headers="[ __('admin.Name'), __('admin.Address'), __('admin.Owner'), __('admin.Total Floors'), __('admin.Total Units'), __('admin.Status')]"
                            :data="$buildings"
                            :columns="[
                                __('admin.Name') => fn($building) => $building->name,
                                __('admin.Address') => fn($building) => $building->address.'<br><b>City:</b> '.$building->city.'<br><b>State:</b> '.$building->state.'<br><b>Post Code:</b> '.$building->postal_code.'<br><b>Country:</b> '.$building->country,
                                __('admin.Owner') => fn($building) => '<a href=\''.route('admin.owners.edit', $building->owner_id).'\'>'.$building->owner->first_name.' '.$building->owner->last_name.'</a>',
                                __('admin.Total Floors') => fn($building) => $building->number_of_floors,
                                __('admin.Total Units') => fn($building) => $building->total_units,
                                __('admin.Status') => fn($building) => $building->status == $building::STATUS_ACTIVE ? '<span class=\'badge badge-sm bg-gradient-success\'>'.__('admin.Active').'</span>' : '<span class=\'badge badge-sm bg-gradient-danger\'>'.__('admin.Inactive').'</span>'
                            ]"
                            :actions="[
                                ['label' => __('admin.Edit'), 'icon' => 'fa fa-edit', 'url' => fn($id) => route('admin.buildings.edit', $id)],
                                ['label' => __('admin.Delete'), 'icon' => 'fa fa-trash', 'onclick' => fn($building) => 'confirmDelete(\''. route('admin.buildings.destroy', $building).'\', \'' . __('admin.Delete Building?') . '\')'],
                            ]"
                            :pagination="$buildings"
                        />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.layouts.inc.delete-modal')
@endsection

