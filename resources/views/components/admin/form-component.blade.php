<form action="{{ $action }}" method="POST" id="{{ $formId }}" class="row" enctype="multipart/form-data">
    @csrf
    @if ($method !== 'POST')
        @method($method)
    @endif

    @foreach ($fields as $name => $field)
        @if($field['type'] === 'hidden')
            <input type="{{ $field['type'] }}" name="{{ $name }}" value="{{ old($name, $model->$name ?? $field['value'] ?? '') }}">
        @elseif($field['type'] === 'file')
            <div class="{{ $field['class'] ?? 'col-md-12' }}">
                <div class="mb-3">
                    <label class="form-label
                    @if(isset($field['required'])) required @endif">{{ $field['label'] }}</label>
                    <input type="file" name="{{ $name }}" class="form-control border border-1 px-2 @error($name) border-danger is-invalid @enderror"
                    {{ $field['attributes'] ?? '' }} placeholder="@isset($field['placeholder']){{$field['placeholder']}}@endisset">
                    @error($name)
                        <span class="text-danger text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        @else
            <div class="{{ $field['class'] ?? 'col-md-12' }}">
                <div class="mb-3">
                    <label class="form-label">{{ $field['label'] }} @isset($field['required']) * @endisset </label>
                    @if($field['type'] === 'textarea')
                        <textarea name="{{ $name }}" class="form-control border border-1 px-2 @error($name) border-danger is-invalid @enderror"
                        {{ $field['attributes'] ?? '' }} placeholder="@isset($field['placeholder']){{$field['placeholder']}}@endisset">{{ old($name, ( $field['value'] ?? $model->$name ?? '')) }}</textarea>
                    @elseif($field['type'] === 'select')
                        <select name="{{ $name }}" class="form-control border border-1 px-2 @error($name) border-danger is-invalid @enderror" {{ $field['attributes'] ?? '' }} @if(isset($field['readonly'])) disabled @endif placeholder="@isset($field['placeholder']){{$field['placeholder']}}@endisset">
                            <option value="">{{ __('admin.Select') }}</option>
                            @foreach ($field['options'] as $key => $value)
                                <option value="{{ $key }}" {{ old($name, $model->$name ?? $field['value'] ?? '') == $key ? 'selected' : '' }}>
                                    {{ $value }}
                                </option>
                            @endforeach
                        </select>
                    @else
                        <input type="{{ $field['type'] }}" name="{{ $name }}" class="form-control border border-1 px-2 @error($name) border-danger is-invalid @enderror"
                        value="{{ old($name, $model->$name ?? $field['value'] ?? '') }}" {{ $field['attributes'] ?? '' }}>
                    @endif
                    @error($name)
                        <span class="text-danger text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        @endif
    @endforeach

    <div class="text-center">
        <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">
            {{ $submitText }}
        </button>
    </div>
</form>
