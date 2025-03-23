@extends('admin.layouts.master')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="card">
                <div class="card-header bg-gradient-primary">
                    <h4 class="mb-0 text-white">{{ __('admin.Apartment Details') }} - {{ $apartment->apartment_number }}</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Apartment Images -->
                        <div class="col-md-6">
                            <div id="apartmentCarousel" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach ($apartment->images as $key => $image)
                                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                            <img src="{{ $image->image_url }}" class="d-block w-100 rounded" alt="Apartment Image">
                                        </div>
                                    @endforeach
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#apartmentCarousel" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#apartmentCarousel" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>

                        <!-- Apartment Details -->
                        <div class="col-md-6">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <strong>{{ __('admin.Building') }}:</strong> {{ $apartment->building->name }}
                                </li>
                                <li class="list-group-item">
                                    <strong>{{ __('admin.Apartment Number') }}:</strong> {{ $apartment->apartment_number }}
                                </li>
                                <li class="list-group-item">
                                    <strong>{{ __('admin.Floor Number') }}:</strong> {{ $apartment->floor_number }}
                                </li>
                                <li class="list-group-item">
                                    <strong>{{ __('admin.Rooms') }}:</strong> {{ $apartment->rooms }}
                                </li>
                                <li class="list-group-item">
                                    <strong>{{ __('admin.Bathrooms') }}:</strong> {{ $apartment->bathrooms }}
                                </li>
                                <li class="list-group-item">
                                    <strong>{{ __('admin.Size SQFT') }}:</strong> {{ $apartment->size_sqft }}
                                </li>
                                <li class="list-group-item">
                                    <strong>{{ __('admin.Rent') }}:</strong> {{ format_currency($apartment->rent) }}
                                </li>
                                <li class="list-group-item">
                                    <strong>{{ __('admin.Status') }}:</strong>
                                    <span class="badge bg-gradient-{{ $apartment->status ? 'success' : 'danger' }}">
                                        {{ App\Models\Apartment::STATUS_ARRAY[$apartment->status] }}
                                    </span>
                                </li>
                                <li class="list-group-item">
                                    <strong>{{ __('admin.Vacancy') }}:</strong>
                                    <span class="badge bg-gradient-{{ $apartment->is_available ? 'success' : 'secondary' }}">
                                        {{ __('admin.'.(App\Models\Apartment::STATUS_AVAILABLE_ARRAY[$apartment->is_available])) }}
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Apartment Features -->
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <h5 class="text-primary">{{ __('admin.Apartment Features') }}</h5>
                            <ul class="list-group">
                                @foreach ($apartment->features as $feature)
                                    <li class="list-group-item"><i class="fa fa-check-circle text-success"></i> {{ $feature->feature }}</li>
                                @endforeach
                                @if ($apartment->features->isEmpty())
                                    <li class="list-group-item text-muted">{{ __('admin.No additional features available') }}</li>
                                @endif
                            </ul>
                        </div>
                    </div>

                    <!-- Total Revenue Section -->
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <h5 class="text-primary">{{ __('admin.Revenue Generated') }}</h5>
                            <div class="card bg-light p-3">
                                <h4 class="text-success mb-0">${{ number_format(rand(2000, 15000), 2) }}</h4>
                                <small class="text-muted">{{ __('admin.Total revenue generated from this apartment') }}</small>
                            </div>
                        </div>
                    </div>

                    <!-- Last 5 Payments -->
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <h5 class="text-primary">{{ __('admin.Last 5 Payments') }}</h5>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>{{ __('admin.Date') }}</th>
                                        <th>{{ __('admin.Amount') }}</th>
                                        <th>{{ __('admin.Method') }}</th>
                                        <th>{{ __('admin.Status') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i = 0; $i < 5; $i++)
                                        <tr>
                                            <td>{{ now()->subMonths($i)->format('Y-m-d') }}</td>
                                            <td>${{ number_format(rand(800, 1500), 2) }}</td>
                                            <td>{{ ['Bank Transfer', 'Cash', 'Card'][array_rand(['Bank Transfer', 'Cash', 'Card'])] }}</td>
                                            <td>
                                                <span class="badge bg-gradient-{{ rand(0, 1) ? 'success' : 'danger' }}">
                                                    {{ rand(0, 1) ? __('admin.Paid') : __('admin.Pending') }}
                                                </span>
                                            </td>
                                        </tr>
                                    @endfor
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Last 5 Maintenance Costs -->
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <h5 class="text-primary">{{ __('admin.Last 5 Maintenance Costs') }}</h5>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>{{ __('admin.Date') }}</th>
                                        <th>{{ __('admin.Description') }}</th>
                                        <th>{{ __('admin.Amount') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i = 0; $i < 5; $i++)
                                        <tr>
                                            <td>{{ now()->subMonths($i)->format('Y-m-d') }}</td>
                                            <td>{{ ['Plumbing Fix', 'Electrical Repair', 'Painting', 'HVAC Maintenance', 'General Cleaning'][array_rand(['Plumbing Fix', 'Electrical Repair', 'Painting', 'HVAC Maintenance', 'General Cleaning'])] }}</td>
                                            <td>${{ number_format(rand(50, 500), 2) }}</td>
                                        </tr>
                                    @endfor
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

                <!-- Back Button -->
                <div class="card-footer text-center">
                    <a href="{{ url()->previous() }}" class="btn btn-secondary">
                        <i class="fa fa-arrow-left"></i> {{ __('admin.Back') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
