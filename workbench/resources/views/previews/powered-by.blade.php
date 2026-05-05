@php
    $defaultCode = '<x-i3::powered-by />';
    $attributesCode = '<x-i3::powered-by class="text-blue-600 font-semibold" id="powered-by-demo" />';
@endphp

<div class="space-y-6">
    <div class="space-y-3">
        <p class="text-xs font-medium text-gray-400 uppercase tracking-wide">Default</p>
        <x-i3::powered-by />
        @include('workbench::previews.partials.code-snippet', ['code' => $defaultCode])
    </div>

    <div class="space-y-3">
        <p class="text-xs font-medium text-gray-400 uppercase tracking-wide">With extra attributes</p>
        <x-i3::powered-by class="text-blue-600 font-semibold" id="powered-by-demo" />
        @include('workbench::previews.partials.code-snippet', ['code' => $attributesCode])
    </div>
</div>
