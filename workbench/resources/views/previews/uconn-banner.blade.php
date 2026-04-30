{{-- Variant: with slot content --}}
<div class="space-y-8">
    <div class="space-y-4">
        <h3 class="text-sm font-semibold text-gray-600 uppercase tracking-wide">Basic Variants</h3>
        
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

    <div class="space-y-4">
        <h3 class="text-sm font-semibold text-gray-600 uppercase tracking-wide">Framework Examples</h3>
        <p class="text-xs text-gray-500">The component adapts responsive max-width constraints based on the CSS framework you're using. Resize your browser to see the content width adjust at different breakpoints.</p>
        
        <div>
            <p class="text-xs font-medium text-gray-400 uppercase tracking-wide mb-2">Bootstrap 5.3 (default)</p>
            <p class="text-xs text-gray-500 mb-2">Breakpoints: 576px (540px), 768px (720px), 992px (960px), 1200px (1140px), 1400px (1320px)</p>
            <x-i3::uconn-banner framework="bootstrap" />
        </div>

        <div>
            <p class="text-xs font-medium text-gray-400 uppercase tracking-wide mb-2">Bulma</p>
            <p class="text-xs text-gray-500 mb-2">Breakpoints: 769px (960px), 1024px (960px), 1216px (1152px), 1408px (1344px)</p>
            <x-i3::uconn-banner framework="bulma" />
        </div>

        <div>
            <p class="text-xs font-medium text-gray-400 uppercase tracking-wide mb-2">Tailwind CSS</p>
            <p class="text-xs text-gray-500 mb-2">Breakpoints: 640px (640px), 768px (768px), 1024px (1024px), 1280px (1280px), 1536px (1536px)</p>
            <x-i3::uconn-banner framework="tailwind" />
        </div>
    </div>
</div>
