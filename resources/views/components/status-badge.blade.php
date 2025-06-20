
@php
    $class = match($status ?? '') {
        'Active' => 'badge bg-success',
        'Completed' => 'badge bg-primary',
        'Requested Change' => 'badge bg-warning',
        default => 'badge bg-secondary',
    };
@endphp

<span class="{{ $class }}">{{ $status }}</span>
            