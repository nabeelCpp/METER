@extends('admin.layouts.master')

@section('content')
    <x-admin.show-component
        :title="__('admin.Owner Details')"
        :fields="[
            'first_name' => __('admin.First Name'),
            'last_name' => __('admin.Last Name'),
            'email' => __('admin.Email'),
            'phone' => __('admin.Phone'),
            'aqama_cnic_id' => __('admin.Aqama/CNIC'),
            'aqama_expiry_date' => __('admin.Aqama Expiry Date'),
            'nafath_verified' => __('admin.Nafath Verified'),
            'status' => __('admin.Status'),
        ]"
        :model="$owner"
        :data="[
            'first_name' => $owner->first_name,
            'last_name' => $owner->last_name,
            'email' => $owner->email,
            'phone' => $owner->phone,
            'aqama_cnic_id' => $owner->aqama_cnic_id,
            'aqama_expiry_date' => format_date($owner->aqama_expiry_date),
            'nafath_verified' => $owner->nafath_verified?'Yes':'No',
            'status' => view('components.status-badge', ['status' => $owner->status]),
        ]"
        :backUrl="route('admin.owners.index')"
    />
@endsection
