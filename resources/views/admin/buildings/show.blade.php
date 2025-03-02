

@extends('admin.layouts.master')

@section('content')
    <x-admin.show-component
        :title="__('admin.Building Details')"
        :fields="[
            'name' => __('admin.Building Name'),
            'address' => __('admin.Address'),
            'city' => __('admin.City'),
            'state' => __('admin.State'),
            'postal_code' => __('admin.Postal Code'),
            'country' => __('admin.Country'),
            'latitude' => __('admin.Latitude'),
            'longitude' => __('admin.Longitude'),
            'number_of_floors' => __('admin.Number Of Floors'),
            'total_units' => __('admin.Total Appartments'),
            'description' => __('admin.Description'),
            'owner_id' => __('admin.Owner'),
            'status' => __('admin.Status'),
        ]"
        :model="$building"
        :data="[
            'name' => $building->name,
            'address' => $building->address,
            'city' => $building->city,
            'state' => $building->state,
            'postal_code' => $building->postal_code,
            'country' => $building->country,
            'latitude' => $building->latitude,
            'longitude' => $building->longitude,
            'number_of_floors' => $building->number_of_floors,
            'total_units' => $building->total_units,
            'description' => $building->description,
            'owner_id' => $building->owner->first_name.' '.$building->owner->last_name,
            'status' => $building->status == $building::STATUS_ACTIVE ? __('admin.Active') : __('admin.Inactive'),
        ]"
        :backUrl="route('admin.buildings.index')"
    />
@endsection

