@props([])

<div {{ $attributes->merge(['class' => '']) }}>
    {{ $slot }}
    <p>powered by ...</p>
</div>
