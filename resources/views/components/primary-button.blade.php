<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-primary px-5 mt-2']) }}>
    {{ $slot }}
</button>
