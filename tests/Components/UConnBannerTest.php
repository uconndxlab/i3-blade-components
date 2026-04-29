<?php

namespace i3\i3BladeComponents\Tests\Components;

use i3\i3BladeComponents\Tests\TestCase;

uses(TestCase::class);

it('renders without errors', function () {
    $view = $this->blade('<x-i3::uconn-banner />');

    expect($view)->not->toBeEmpty();
});

it('renders slot content', function () {
    $view = $this->blade(
        '<x-i3::uconn-banner>Hello</x-i3::uconn-banner>'
    );

    expect((string) $view)->toContain('Hello');
});
