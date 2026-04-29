@include('i3::components._styles')

@props([])

<div {{ $attributes->merge(['class' => '']) }}>
    {{ $slot }}
</div>
