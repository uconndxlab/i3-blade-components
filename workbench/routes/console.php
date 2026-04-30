<?php

use i3\i3BladeComponents\i3BladeComponentsServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Symfony\Component\Console\Command\Command;

Artisan::command('workbench:export-static {--path=build/workbench-preview}', function (): int {
    $providerPath = (new ReflectionClass(i3BladeComponentsServiceProvider::class))
        ->getFileName();
    $packageRoot = dirname($providerPath, 2);
    $outputPath = $packageRoot.'/'.trim((string) $this->option('path'), '/');

    $htmlResponse = app()->handle(Request::create('/', 'GET'));
    $cssResponse = app()->handle(Request::create('/i3-blade-components.css', 'GET'));

    abort_unless($htmlResponse->isSuccessful(), 500, 'Failed to render workbench gallery HTML.');
    abort_unless($cssResponse->isSuccessful(), 500, 'Failed to render workbench gallery CSS.');

    File::ensureDirectoryExists($outputPath);

    $html = (string) $htmlResponse->getContent();
    $html = preg_replace(
        '/href="[^"]*i3-blade-components\.css[^"]*"/',
        'href="./i3-blade-components.css"',
        $html,
    );

    File::put($outputPath.'/index.html', $html ?? '');
    File::put($outputPath.'/i3-blade-components.css', (string) $cssResponse->getContent());

    $this->info('Static preview exported to: '.$outputPath);

    return Command::SUCCESS;
})->purpose('Export workbench gallery as static files for GitHub Pages');
