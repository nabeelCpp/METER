@extends('superadmin.layouts.master')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between mb-4">
        <h1 class="mb-0">Manage Admins</h1>
        <a href="{{ route('superadmin.admins.create') }}" class="btn btn-primary"> <i class="fa fa-plus"></i></a>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Admins Table -->
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($admins as $index => $admin)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $admin->name }}</td>
                        <td>{{ $admin->email }}</td>
                        <td>{{ $admin->phone }}</td>
                        <td>{{ admin_status($admin->status) }}</td>
                        <td>{{ $admin->created_at->format('d M Y') }}</td>
                        <td>
                            <a href="{{ route('superadmin.admins.edit', $admin->id) }}" class="btn btn-sm btn-info">Edit</a>
                            <form action="{{ route('superadmin.admins.destroy', $admin->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Are you sure you want to delete this admin?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">No admins found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <!-- Pagination Links -->
        <div class="d-flex justify-content-center">
            {{ $admins->links('vendor.pagination.bootstrap-5') }}
        </div>
    </div>
</div>
@endsection
