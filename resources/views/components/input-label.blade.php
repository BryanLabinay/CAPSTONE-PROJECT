@props(['value'])

<label {{ $attributes->merge(['class' => 'd-flex justify-content-start fw-semibold  ms-2']) }}>
    {{ $value ?? $slot }}
</label>
