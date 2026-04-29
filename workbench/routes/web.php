<?php

use i3\i3BladeComponents\i3BladeComponentsServiceProvider;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;

Route::get('/i3-blade-components.css', function () {
    $providerPath = (new ReflectionClass(i3BladeComponentsServiceProvider::class))
        ->getFileName();
    $packageRoot = dirname($providerPath, 2);

    $candidatePaths = [
        $packageRoot.'/resources/dist/i3-blade-components.css',
        public_path('vendor/blade-components/i3-blade-components.css'),
    ];

    $cssPath = null;

    foreach ($candidatePaths as $candidatePath) {
        if (File::exists($candidatePath)) {
            $cssPath = $candidatePath;

            break;
        }
    }

    abort_unless($cssPath !== null, 404);

    return response(File::get($cssPath), 200, [
        'Content-Type' => 'text/css; charset=UTF-8',
        'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0',
    ]);
})->name('i3.workbench.css');

Route::get('/', function () {
    $components = [
        'powered-by' => 'Powered By',
        'uconn-banner' => 'UConn Banner',
    ];

    return view('workbench::gallery', compact('components'));
});
