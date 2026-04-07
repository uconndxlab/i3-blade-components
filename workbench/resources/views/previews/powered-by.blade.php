{{-- Variant: with slot content --}}
<div class="space-y-6">
    <div>
        <p class="text-xs font-medium text-gray-400 uppercase tracking-wide mb-2">With slot content</p>
        <x-i3::powered-by>
            Powered by <strong>i3</strong>
        </x-i3::powered-by>
    </div>

    <div>
        <p class="text-xs font-medium text-gray-400 uppercase tracking-wide mb-2">Empty (no slot)</p>
        <x-i3::powered-by />
    </div>

    <div>
        <p class="text-xs font-medium text-gray-400 uppercase tracking-wide mb-2">With extra attributes</p>
        <x-i3::powered-by class="text-blue-600 font-semibold" id="powered-by-demo">
            Powered by i3 — styled via attributes
        </x-i3::powered-by>
    </div>
</div>
