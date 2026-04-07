<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>i3 Blade Components</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-900 antialiased">
    <div class="flex min-h-screen">

        {{-- Sidebar --}}
        <aside class="w-56 shrink-0 bg-white border-r border-gray-200 flex flex-col">
            <div class="px-5 py-4 border-b border-gray-200">
                <span class="text-xs font-semibold uppercase tracking-widest text-gray-400">i3 Components</span>
            </div>
            <nav class="flex-1 overflow-y-auto px-3 py-4 space-y-1">
                @foreach ($components as $slug => $label)
                    <a href="#{{ $slug }}"
                       class="block rounded-md px-3 py-2 text-sm font-medium text-gray-700 hover:bg-gray-100 hover:text-gray-900 transition-colors">
                        {{ $label }}
                    </a>
                @endforeach
            </nav>
        </aside>

        {{-- Main --}}
        <main class="flex-1 overflow-y-auto p-10">
            @yield('content')
        </main>

    </div>
</body>
</html>
