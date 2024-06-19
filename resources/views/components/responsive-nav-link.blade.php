@props(['active'])

@php
    $classes = $active ?? false ? 'text-decoration-none text-danger me-2' : 'text-decoration-none text-danger ms-3';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
