<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>i3 Blade Components</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism-themes/1.9.0/prism-base16-ateliersulphurpool.light.min.css" />
    @include('i3::components._styles')
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/prism.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-markup.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var copyButtons = document.querySelectorAll('[data-copy-code]');

            copyButtons.forEach(function (button) {
                button.addEventListener('click', async function () {
                    var container = button.closest('[data-code-block]');

                    if (!container) {
                        return;
                    }

                    var code = container.querySelector('code');

                    if (!code) {
                        return;
                    }

                    var text = code.innerText;

                    try {
                        await navigator.clipboard.writeText(text);
                    } catch (error) {
                        var textarea = document.createElement('textarea');
                        textarea.value = text;
                        textarea.setAttribute('readonly', 'readonly');
                        textarea.style.position = 'absolute';
                        textarea.style.left = '-9999px';
                        document.body.appendChild(textarea);
                        textarea.select();
                        document.execCommand('copy');
                        document.body.removeChild(textarea);
                    }

                    var originalText = button.textContent;
                    button.textContent = 'Copied';

                    window.setTimeout(function () {
                        button.textContent = originalText;
                    }, 2000);
                });
            });
        });
    </script>
</body>
</html>
