<?php

namespace i3\i3BladeComponents\Tests\Components;

use i3\i3BladeComponents\Tests\TestCase;

uses(TestCase::class);

it('renders without errors', function () {
    $view = $this->blade('<x-i3::powered-by />');

    expect($view)->not->toBeEmpty();
});

it('renders slot content', function () {
    $view = $this->blade(
        '<x-i3::powered-by>Hello</x-i3::powered-by>'
    );

    expect((string) $view)->toContain('Hello');
});
