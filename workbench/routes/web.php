<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $components = [
        'powered-by' => 'Powered By',
    ];

    return view('workbench::gallery', compact('components'));
});
