{{-- Variant: with slot content --}}
<div class="space-y-6">
    <div>
        <p class="text-xs font-medium text-gray-400 uppercase tracking-wide mb-2">With slot content</p>
        <x-i3::uconn-banner>
            UConn Banner Content
        </x-i3::uconn-banner>
    </div>

    <div>
        <p class="text-xs font-medium text-gray-400 uppercase tracking-wide mb-2">Empty (no slot)</p>
        <x-i3::uconn-banner />
    </div>

    <div>
        <p class="text-xs font-medium text-gray-400 uppercase tracking-wide mb-2">With extra attributes</p>
        <x-i3::uconn-banner class="text-blue-600 font-semibold" id="uconn-banner-demo">
            UConn Banner — styled via attributes
        </x-i3::uconn-banner>
    </div>
</div>
