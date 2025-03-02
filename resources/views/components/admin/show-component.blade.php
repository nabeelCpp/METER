<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card card-plain">
                <div class="card-header">
                    <h4 class="font-weight-bolder">{{ $title }}</h4>
                </div>
                <div class="card-body">
                    <table class="table align-items-center mb-0">
                        <tbody>
                            @foreach ($fields as $key => $label)
                                <tr>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bold">
                                        {{ $label }}
                                    </th>
                                    <td class="text-sm">
                                        {{ $data[$key] ?? '-' }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                    <a href="{{ url()->previous() }}" class="text-primary text-gradient font-weight-bold">
                        {{ __('admin.Back') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
