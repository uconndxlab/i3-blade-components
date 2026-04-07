@extends('workbench::layout')

@section('content')
    <header class="mb-10">
        <h1 class="text-3xl font-bold text-gray-900">Component Gallery</h1>
        <p class="mt-2 text-gray-500">Live previews of all i3 Blade components.</p>
    </header>

    @foreach ($components as $slug => $label)
        <section id="{{ $slug }}" class="mb-16 scroll-mt-8">
            <h2 class="text-xl font-semibold text-gray-800 mb-1">{{ $label }}</h2>
            <p class="text-xs font-mono text-gray-400 mb-5">&lt;x-i3::{{ $slug }} /&gt;</p>

            <div class="rounded-xl border border-gray-200 bg-white overflow-hidden">
                {{-- Preview area --}}
                <div class="p-8 bg-gray-50 border-b border-gray-200">
                    @include('workbench::previews.' . $slug)
                </div>
            </div>
        </section>
    @endforeach
@endsection
