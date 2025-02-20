@php
    $statusColors = [
        owner_status_verified() => 'success',
        owner_status_pending() => 'warning',
        owner_status_suspended() => 'danger'
    ];
@endphp

<span class="badge badge-sm bg-gradient-{{ $statusColors[$status] ?? 'secondary' }}">
    {{ ucfirst($status) }}
</span>
