@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card card-plain">
                    <div class="card-header">
                        <h4 class="font-weight-bolder">{{ __(isset($owner) ? 'admin.Update Building' : 'admin.Add New Building') }}</h4>
                        <p class="mb-0">{{ __('admin.Enter Building details to create or update a new Building') }}</p>
                    </div>
                    <div class="card-body">
                        <x-admin.form-component
                            :action="isset($building) ? route('admin.buildings.update', $building) : route('admin.buildings.store')"
                            :method="isset($building) ? 'PUT' : 'POST'"
                            :fields="[
                                'name' => ['label' => __('admin.Building Name'), 'type' => 'text', 'required' => true],
                                'address' => ['label' => __('admin.Address'), 'type' => 'text', 'required' => true],
                                'city' => ['label' => __('admin.City'), 'type' => 'text', 'class' => 'col-md-6', 'required' => true],
                                'state' => ['label' => __('admin.State'), 'type' => 'text', 'class' => 'col-md-6', 'required' => true],
                                'country' => ['label' => __('admin.Country'), 'type' => 'text', 'class' => 'col-md-6', 'required' => true],
                                'postal_code' => ['label' => __('admin.Postal Code'), 'type' => 'text', 'class' => 'col-md-6', 'required' => true],
                                'latitude' => ['label' => __('admin.Latitude'), 'type' => 'text', 'class' => 'col-md-6'],
                                'longitude' => ['label' => __('admin.Longitude'), 'type' => 'text', 'class' => 'col-md-6'],
                                'number_of_floors' => ['label' => __('admin.Number Of Floors'), 'type' => 'number', 'attributes' => 'min=1', 'class' => 'col-md-6', 'required' => true],
                                'total_units' => ['label' => __('admin.Total Appartments'), 'type' => 'number', 'attributes' => 'min=1', 'class' => 'col-md-6', 'required' => true],
                                'description' => ['label' => __('admin.Description'), 'type' => 'textarea'],
                                'owner_id' => ['label' => __('admin.Owner'), 'type' => 'select', 'options' => $owners],
                            ]"
                            :submitText="isset($building) ? __('admin.Update Building') : __('admin.Add Building')"
                            :model="$building ?? null"
                        />
                    </div>

                    <div class="card-footer text-center pt-0 px-lg-2 px-1">
                        <p class="mb-2 text-sm mx-auto">
                            <a href="{{ route('admin.buildings.index') }}" class="text-primary text-gradient font-weight-bold">
                                {{ __('admin.Back to Buildings List') }}
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
