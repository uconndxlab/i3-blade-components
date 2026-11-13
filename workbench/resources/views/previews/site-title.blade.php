@php
    $defaultCode = '<x-i3::site-title title="Digital Experience" subheader="University of Connecticut" />';
    $linksCode = '<x-i3::site-title title="Digital Experience" subheader="University of Connecticut" title-url="/" subheader-url="https://uconn.edu" />';
    $rightSlotCode = '<x-i3::site-title title="Digital Experience" subheader="University of Connecticut">
    <x-slot:right>
        <a href="/apply">Apply now</a>
    </x-slot:right>
</x-i3::site-title>';
    $tailwindCode = '<x-i3::site-title title="Digital Experience" subheader="University of Connecticut" framework="tailwind" />';
    $customContainerCode = '<x-i3::site-title title="Digital Experience" subheader="University of Connecticut" container-class="mx-auto max-w-5xl" />';
@endphp

<div class="space-y-8">
    <div class="space-y-4">
        <h3 class="text-sm font-semibold text-gray-600 uppercase tracking-wide">Basic Variants</h3>

        <div class="space-y-3">
            <p class="text-xs font-medium text-gray-400 uppercase tracking-wide">Default</p>
            <x-i3::site-title title="Digital Experience" subheader="University of Connecticut" />
            @include('workbench::previews.partials.code-snippet', ['code' => $defaultCode])
        </div>

        <div class="space-y-3">
            <p class="text-xs font-medium text-gray-400 uppercase tracking-wide">Linked title and subheader</p>
            <x-i3::site-title
                title="Digital Experience"
                subheader="University of Connecticut"
                title-url="/"
                subheader-url="https://uconn.edu"
            />
            @include('workbench::previews.partials.code-snippet', ['code' => $linksCode])
        </div>

        <div class="space-y-3">
            <p class="text-xs font-medium text-gray-400 uppercase tracking-wide">Right-aligned content</p>
            <x-i3::site-title title="Digital Experience" subheader="University of Connecticut">
                <x-slot:right>
                    <a href="/apply">Apply now</a>
                </x-slot:right>
            </x-i3::site-title>
            @include('workbench::previews.partials.code-snippet', ['code' => $rightSlotCode])
        </div>
    </div>

    <div class="space-y-4">
        <h3 class="text-sm font-semibold text-gray-600 uppercase tracking-wide">Width Containment</h3>

        <div class="space-y-3">
            <p class="text-xs font-medium text-gray-400 uppercase tracking-wide">Tailwind breakpoints</p>
            <x-i3::site-title title="Digital Experience" subheader="University of Connecticut" framework="tailwind" />
            @include('workbench::previews.partials.code-snippet', ['code' => $tailwindCode])
        </div>

        <div class="space-y-3">
            <p class="text-xs font-medium text-gray-400 uppercase tracking-wide">Custom container class</p>
            <x-i3::site-title
                title="Digital Experience"
                subheader="University of Connecticut"
                container-class="mx-auto max-w-5xl"
            />
            @include('workbench::previews.partials.code-snippet', ['code' => $customContainerCode])
        </div>
    </div>
</div>
