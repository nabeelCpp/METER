@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card card-plain">
                    <div class="card-header">
                        <h4 class="font-weight-bolder">{{ __('admin.Add Apartment') }}</h4>
                        <p class="mb-0">{{ __('admin.Enter apartment details to create a new apartment') }}</p>
                    </div>
                    <div class="card-body">
                        @include('admin.layouts.inc.alerts')
                        @if(!isset($apartment))
                            <input type="checkbox" id="bulk_upload" class="form-check-input"> <label for="bulk_upload">{{ __('admin.Bulk Upload') }}</label>
                            <div id="bulk_upload_form" class="d-none">
                                <x-admin.form-component
                                    :action="route('admin.buildings.apartments.bulk-upload', $building)"
                                    :method="'POST'"
                                    :fields="[
                                        '' => ['label' => __('admin.Building'),'type' => 'select', 'options' => [$building->id => $building->name], 'value' => $building->id, 'readonly' => true],
                                        'building_id' => ['type' => 'hidden', 'value' => $building->id],
                                        'apartments_file' => ['label' => __('admin.File(csv/excel File allowed)'), 'type' => 'file', 'required' => true],
                                    ]"
                                />
                            </div>
                        @endif
                        <div id="normal_upload">
                            <x-admin.form-component
                                :action="isset($apartment) ? route('admin.buildings.apartments.update', [$building, $apartment]) : route('admin.buildings.apartments.store', $building)"
                                :method="isset($building) ? 'PUT' : 'POST'"
                                :fields="[
                                    '' => ['label' => __('admin.Building'),'type' => 'select', 'options' => [$building->id => $building->name], 'value' => $building->id, 'readonly' => true],
                                    'building_id' => ['type' => 'hidden', 'value' => $building->id],
                                    'floor_number' => ['label' => __('admin.Floor Number'), 'type' => 'select', 'required' => true, 'options' => array_combine(range(1, $building->number_of_floors), range(1, $building->number_of_floors)), 'class' => 'col-md-2'],
                                    'apartment_number' => ['label' => __('admin.Apartment Number'), 'type' => 'text', 'required' => true, 'class' => 'col-md-2', 'attributes' => 'min=1' ],
                                    'rooms' => ['label' => __('admin.Rooms'), 'type' => 'number', 'required' => true, 'class' => 'col-md-2', 'attributes' => 'min=1' ],
                                    'bathrooms' => ['label' => __('admin.Bathrooms'), 'type' => 'number', 'required' => true, 'class' => 'col-md-2', 'attributes' => 'min=1' ],
                                    'rent' => ['label' => __('admin.Rent'), 'type' => 'number', 'required' => true, 'class' => 'col-md-2', 'attributes' => 'min=1' ],
                                    'size_sqft' => ['label' => __('admin.Size SQFT'), 'type' => 'number', 'required' => true, 'class' => 'col-md-2', 'attributes' => 'min=1' ],
                                    'image_urls' => ['label' => __('admin.Images'), 'type' => 'textarea', 'required' => true, 'class' => 'col-md-12', 'attributes' => 'rows=3', 'placeholder' => __('admin.Enter image urls separated by comma'), 'value' => isset($apartment) && $apartment->images ? implode(',', $apartment->images->pluck('image_url')->toArray()) : '' ],
                                    'features' => ['label' => __('admin.Features'), 'type' => 'textarea', 'class' => 'col-md
                                    -12', 'attributes' => 'rows=3', 'placeholder' => __('admin.Enter features separated by comma'), 'value' => isset($apartment) &&$apartment->features ? implode(',', $apartment->features->pluck('feature')->toArray()) : ''],
                                ]"
                                :submitText="isset($apartment) ? __('admin.Update Apartment') : __('admin.Add Apartment')"
                                :model="$apartment ?? null"
                            />
                        </div>
                    </div>

                    <div class="card-footer text-center pt-0 px-lg-2 px-1">
                        <p class="mb-2 text-sm mx-auto">
                            <a href="{{ route('admin.buildings.apartments.index', $building) }}"
                               class="text-primary text-gradient font-weight-bold">
                                {{ __('admin.Back') }}
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $('#bulk_upload').change(function() {
            if ($(this).is(':checked')) {
                $('#bulk_upload_form').removeClass('d-none');
                $('#normal_upload').addClass('d-none');
            } else {
                $('#bulk_upload_form').addClass('d-none');
                $('#normal_upload').removeClass('d-none');
            }
        });
    </script>
@endpush
