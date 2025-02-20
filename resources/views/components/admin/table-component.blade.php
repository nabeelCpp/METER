<div class="table-responsive p-0">
    <table class="table align-items-center mb-0">
        <thead>
            <tr>
                @if ($showIndex ?? false)  {{-- Add index column if enabled --}}
                    <th class="text-uppercase font-weight-bold text-xxs font-weight-bolder opacity-7">#</th>
                @endif
                @foreach($headers as $header)
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">{{ $header }}</th>
                @endforeach
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">{{ __('admin.Actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @if($data->isEmpty())
                <tr>
                    <td colspan="{{ count($headers) + 1 }}" class="text-center py-4">
                        <h6 class="text-uppercase text-secondary mb-0">{{ __('admin.No Records Found') }}</h6>
                    </td>
                </tr>
            @endif
            @foreach($data as $item)
                <tr>
                    @if ($showIndex ?? false) {{-- Show index if enabled --}}
                        <td><p class="text-sm mb-0">
                            {{ ($data->currentPage() - 1) * $data->perPage() + $loop->iteration }}</p>
                        </td>
                    @endif
                    @foreach($columns as $column => $callback)
                        <td>
                            <p class="text-sm mb-0">{!! $callback($item) !!}</p>
                        </td>
                    @endforeach
                    <td>
                        @foreach($actions as $action)
                            <a @isset($action['url']) href="{{ $action['url']($item) }}" @else type="button" @endisset class="btn btn-sm {{ $action['class'] ?? 'btn-primary'}}" @isset($action['onclick']) onclick="{{$action['onclick']($item)}}" @endisset>
                                <i class="{{ $action['icon'] }}"></i> {{ $action['label'] }}
                            </a>
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@if ($pagination && $data instanceof \Illuminate\Pagination\LengthAwarePaginator)
    <div class="d-flex justify-content-center mt-3">
        {{ $data->links('vendor.pagination.bootstrap-4') }}
    </div>
@endif
