<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-primary w-100 background-color:#682a7a !important']) }}>
    {{ $slot }}
</button>