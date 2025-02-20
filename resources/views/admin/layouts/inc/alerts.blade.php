@if(session('error'))
    <div class="alert alert-danger alert-dismissible text-white mb-5" role="alert">
        <span class="text-sm">{{ session('error') }}</span>
        <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if(session('success'))
    <div class="alert alert-success alert-dismissible text-white mb-5" role="alert">
        <span class="text-sm">{{ session('success') }}</span>
        <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if(session('info'))
    <div class="alert alert-info alert-dismissible text-white mb-5" role="alert">
        <span class="text-sm">{{ session('info') }}</span>
        <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if($errors->any())
    <div class="alert alert-danger alert-dismissible text-white mb-5">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
