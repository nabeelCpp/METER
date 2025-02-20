@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card card-plain">
                    <div class="card-header">
                        <h4 class="font-weight-bolder">{{ __(isset($owner) ? 'admin.Update Owner' : 'admin.Add Owner') }}</h4>
                        <p class="mb-0">{{ __('admin.Enter owner details to create or update a new owner') }}</p>
                    </div>
                    <div class="card-body">
                        <form role="form" method="POST" action="@isset($owner){{route('admin.owners.update', $owner)}}@else{{ route('admin.owners.store') }}@endisset">
                            @csrf
                            @isset($owner)
                                @method('PUT')
                            @endisset

                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label">{{ __('admin.First Name') }}</label>
                                <input type="text" name="first_name" class="form-control" value="{{ old('first_name') ?? $owner->first_name ?? '' }}">
                            </div>
                            @error('first_name')
                                <span class="text-danger text-sm">{{ __('validation.'.$message) }}</span>
                            @enderror

                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label">{{ __('admin.Last Name') }}</label>
                                <input type="text" name="last_name" class="form-control" value="{{ old('last_name') ?? $owner->last_name ?? '' }}">
                            </div>
                            @error('last_name')
                                <span class="text-danger text-sm">{{ __('validation.'.$message) }}</span>
                            @enderror

                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label">{{ __('admin.Email') }}</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email') ?? $owner->email ?? '' }}">
                            </div>
                            @error('email')
                                <span class="text-danger text-sm">{{ __('validation.'.$message) }}</span>
                            @enderror

                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label">{{ __('admin.Phone') }}</label>
                                <input type="text" name="phone" class="form-control" value="{{ old('phone') ?? $owner->phone ?? '' }}">
                            </div>
                            @error('phone')
                                <span class="text-danger text-sm">{{ __('validation.'.$message) }}</span>
                            @enderror

                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label">{{ __('admin.Password') }}</label>
                                <input type="password" name="password" class="form-control" value="">
                            </div>
                            @error('password')
                                <span class="text-danger text-sm">{{ __('validation.'.$message) }}</span>
                            @enderror

                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label">{{ __('admin.Address') }}</label>
                                <input type="text" name="address" class="form-control" value="{{ old('address') ?? $owner->address ?? '' }}">
                            </div>
                            @error('address')
                                <span class="text-danger text-sm">{{ __('validation.'.$message) }}</span>
                            @enderror

                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label">{{ __('admin.Aqama/CNIC') }}</label>
                                <input type="text" name="aqama_cnic_id" class="form-control" value="{{ old('aqama_cnic_id') ?? $owner->aqama_cnic_id ?? '' }}">
                            </div>
                            @error('aqama_cnic_id')
                                <span class="text-danger text-sm">{{ __('validation.'.$message) }}</span>
                            @enderror

                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label">{{ __('admin.Aqama Expiry Date') }}</label>
                                <input type="date" name="aqama_expiry_date" class="form-control" value="{{ old('aqama_expiry_date') ?? (isset($owner)?format_date($owner->aqama_expiry_date, 'Y-m-d') : '') }}" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}">
                            </div>
                            @error('aqama_expiry_date')
                                <span class="text-danger text-sm">{{ __('validation.'.$message) }}</span>
                            @enderror

                            <div class="input-group input-group-outline mb-3">
                                <select name="status" id="status" class="form-control">
                                    @foreach ($status as $item)
                                        <option value="{{$item}}" @if(old('status') == $item || (isset($owner) && $owner->status == $item)) selected @endif>{{__('admin.'.ucfirst($item))}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-check form-switch ps-0 is-filled">
                                <input class="form-check-input ms-auto" type="checkbox" id="nafathVerified" {{ old('nafath_verified') || (isset($owner) && $owner->nafath_verified) ? 'checked' : '' }} name="nafath_verified">
                                <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0" for="nafathVerified">{{ __('admin.Nafath Verified?') }}</label>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">
                                    {{ __(isset($owner) ? 'admin.Update Owner': 'admin.Add Owner') }}
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="card-footer text-center pt-0 px-lg-2 px-1">
                        <p class="mb-2 text-sm mx-auto">
                            <a href="{{ route('admin.owners.index') }}" class="text-primary text-gradient font-weight-bold">
                                {{ __('admin.Back to Owners List') }}
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
