@php
    $stylesheetHref = \Illuminate\Support\Facades\Route::has('i3.workbench.css')
        ? route('i3.workbench.css')
        : asset('vendor/blade-components/i3-blade-components.css');
@endphp

@once
    <link rel="stylesheet" href="{{ $stylesheetHref }}">
@endonce
 