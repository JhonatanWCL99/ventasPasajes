@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-lg text-black-10']) }}>
    {{ $value ?? $slot }}
</label>
