<form action="{{ $action }}" method="POST" id="{{ $formId }}" class="row">
    @csrf
    @if ($method !== 'POST')
        @method($method)
    @endif

    @foreach ($fields as $name => $field)
        <div class="{{ $field['class'] ?? 'col-md-12' }}">
            <div class="mb-3">
                <label class="form-label">{{ $field['label'] }} @isset($field['required']) * @endisset </label>
                @if($field['type'] === 'textarea')
                    <textarea name="{{ $name }}" class="form-control border border-1 px-2 @error($name) border-danger is-invalid @enderror"
                    {{ $field['attributes'] ?? '' }}>{{ old($name, $model->$name ?? '') }}</textarea>
                @elseif($field['type'] === 'select')
                    <select name="{{ $name }}" class="form-control border border-1 px-2 @error($name) border-danger is-invalid @enderror" {{ $field['attributes'] ?? '' }}>
                        <option value="">{{ __('admin.Select') }}</option>
                        @foreach ($field['options'] as $key => $value)
                            <option value="{{ $key }}" {{ old($name, $model->$name ?? '') == $key ? 'selected' : '' }}>
                                {{ $value }}
                            </option>
                        @endforeach
                    </select>
                @else
                    <input type="{{ $field['type'] }}" name="{{ $name }}" class="form-control border border-1 px-2 @error($name) border-danger is-invalid @enderror"
                    value="{{ old($name, $model->$name ?? '') }}" {{ $field['attributes'] ?? '' }}>
                @endif
                @error($name)
                    <span class="text-danger text-sm">{{ $message }}</span>
                @enderror
            </div>
        </div>
    @endforeach

    <div class="text-center">
        <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">
            {{ $submitText }}
        </button>
    </div>
</form>
