@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                @include('admin.layouts.inc.alerts')
                <div class="col-12 mt-4">
                    <div class="mb-5 ps-3">
                        <h6 class="mb-1">{{ __('admin.Appartments') }}</h6>
                        <p class="text-sm">{{ $building->name }}</p>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <a href="{{ route('admin.buildings.apartments.create', $building) }}" class="btn btn-dark">
                                <i class="fa fa-plus"></i> {{ __('admin.Add New Apartments') }}
                            </a>
                        
                            <form method="POST" action="{{ route('admin.buildings.apartments.deleteAll', $building) }}" onsubmit="return confirm('{{__('admin.Are you sure you want to delete all apartments for this building?')}}');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger ms-auto">
                                    <i class="fa fa-trash"></i> {{ __('admin.Delete All Apartments') }}
                                </button>
                            </form>
                        </div>                        
                    </div>
                    <div class="row">
                        @if($apartments->isEmpty())
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <h4>{{ __('admin.No Apartments Found') }}</h4>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @foreach ($apartments as $apartment)
                            <div class="col-xl-3 col-md-6 mb-xl-0 mb-4 py-4">
                                <div class="card card-blog card-plain">
                                    <div class="card-header p-0 mt-n4 mx-3">
                                        <a class="d-block shadow-xl border-radius-xl">
                                            <img src="{{ $apartment->images->first()->image_url }}"
                                                alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                                        </a>
                                    </div>
                                    <div class="card-body p-3">
                                        {{-- <p class="mb-0 text-sm">Project #4</p> --}}
                                        <a href="javascript:;">
                                            <h5>
                                                {{__('admin.Appartment#')}} {{ $apartment->floor_number.str_pad_left($apartment->apartment_number, 2) }}
                                            </h5>
                                        </a>
                                        <p class="mb-4 text-sm">
                                            {{__('admin.Rent')}}: {{ format_currency($apartment->rent) }} <br>
                                            {{__('admin.Size')}}: {{ $apartment->size_sqft }} {{__('admin.SQFT')}} <br>
                                            {{__('admin.Rooms')}}: {{ $apartment->rooms }} <br>
                                            {{__('admin.Bathrooms')}}: {{ $apartment->bathrooms }}
                                        </p>
                                        <div class="form-group">
                                            <a href="{{ route('admin.buildings.apartments.show', [$building, $apartment]) }}" class="btn btn-outline-info btn-sm mb-0">{{__('admin.View')}}</a>
                                            <a href="{{ route('admin.buildings.apartments.edit', [$building, $apartment]) }}" class="btn btn-outline-secondary btn-sm mb-0">{{__('admin.Edit')}}</a>
                                            <a onclick="confirmDelete('{{ route('admin.buildings.apartments.destroy', [$building, $apartment]) }}', '{{__('admin.Delete Apartment?')}}')" class="btn btn-outline-danger btn-sm mb-0">{{__('admin.Delete')}}</a>
                                            {{-- <div class="avatar-group mt-2">
                                                <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                    data-bs-toggle="tooltip" data-bs-placement="bottom" title="Peterson">
                                                    <img alt="Image placeholder" src="../assets/img/team-4.jpg">
                                                </a>
                                                <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                    data-bs-toggle="tooltip" data-bs-placement="bottom" title="Nick Daniel">
                                                    <img alt="Image placeholder" src="../assets/img/team-3.jpg">
                                                </a>
                                                <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                    data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ryan Milly">
                                                    <img alt="Image placeholder" src="../assets/img/team-2.jpg">
                                                </a>
                                                <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                    data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                    title="Elena Morison">
                                                    <img alt="Image placeholder" src="../assets/img/team-1.jpg">
                                                </a>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="">
                {{ $apartments->links('vendor.pagination.bootstrap-4') }}
                Showing {{ $apartments->firstItem() }} to {{ $apartments->lastItem() }} of {{ $apartments->total() }} entries
            </div>
        </div>
    </div>
    @include('admin.layouts.inc.delete-modal')
@endsection
