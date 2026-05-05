@php
    $defaultCode = '<x-i3::uconn-banner />';
    $attributesCode = '<x-i3::uconn-banner class="text-blue-600 font-semibold" id="uconn-banner-demo" />';
    $bootstrapCode = '<x-i3::uconn-banner framework="bootstrap" />';
    $bulmaCode = '<x-i3::uconn-banner framework="bulma" />';
    $tailwindCode = '<x-i3::uconn-banner framework="tailwind" />';
@endphp

<div class="space-y-8">
    <div class="space-y-4">
        <h3 class="text-sm font-semibold text-gray-600 uppercase tracking-wide">Basic Variants</h3>

        <div class="space-y-3">
            <p class="text-xs font-medium text-gray-400 uppercase tracking-wide">Default</p>
            <x-i3::uconn-banner />
            @include('workbench::previews.partials.code-snippet', ['code' => $defaultCode])
        </div>

        <div class="space-y-3">
            <p class="text-xs font-medium text-gray-400 uppercase tracking-wide">With extra attributes</p>
            <x-i3::uconn-banner class="text-blue-600 font-semibold" id="uconn-banner-demo" />
            @include('workbench::previews.partials.code-snippet', ['code' => $attributesCode])
        </div>
    </div>

    <div class="space-y-4">
        <h3 class="text-sm font-semibold text-gray-600 uppercase tracking-wide">Framework Examples</h3>
        <p class="text-xs text-gray-500">The component adapts responsive max-width constraints based on the CSS framework you're using. Resize your browser to see the content width adjust at different breakpoints.</p>

        <div class="space-y-3">
            <p class="text-xs font-medium text-gray-400 uppercase tracking-wide">Bootstrap 5.3 (default)</p>
            <p class="text-xs text-gray-500">Breakpoints: 576px (540px), 768px (720px), 992px (960px), 1200px (1140px), 1400px (1320px)</p>
            <x-i3::uconn-banner framework="bootstrap" />
            @include('workbench::previews.partials.code-snippet', ['code' => $bootstrapCode])
        </div>

        <div class="space-y-3">
            <p class="text-xs font-medium text-gray-400 uppercase tracking-wide">Bulma</p>
            <p class="text-xs text-gray-500">Breakpoints: 769px (960px), 1024px (960px), 1216px (1152px), 1408px (1344px)</p>
            <x-i3::uconn-banner framework="bulma" />
            @include('workbench::previews.partials.code-snippet', ['code' => $bulmaCode])
        </div>

        <div class="space-y-3">
            <p class="text-xs font-medium text-gray-400 uppercase tracking-wide">Tailwind CSS</p>
            <p class="text-xs text-gray-500">Breakpoints: 640px (640px), 768px (768px), 1024px (1024px), 1280px (1280px), 1536px (1536px)</p>
            <x-i3::uconn-banner framework="tailwind" />
            @include('workbench::previews.partials.code-snippet', ['code' => $tailwindCode])
        </div>
    </div>
</div>
