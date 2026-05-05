<?php

namespace i3\i3BladeComponents\Tests\Components;

use i3\i3BladeComponents\Tests\TestCase;

uses(TestCase::class);

it('renders without errors', function () {
    $view = $this->blade('<x-i3::uconn-banner />');

    expect($view)->not->toBeEmpty();
});

it('defaults to bootstrap framework', function () {
    $view = $this->blade('<x-i3::uconn-banner />');

    expect((string) $view)->toContain('uconn-banner-bootstrap');
});

it('applies bootstrap framework class when specified', function () {
    $view = $this->blade('<x-i3::uconn-banner framework="bootstrap" />');

    expect((string) $view)->toContain('uconn-banner-bootstrap');
});

it('applies bulma framework class when specified', function () {
    $view = $this->blade('<x-i3::uconn-banner framework="bulma" />');

    expect((string) $view)->toContain('uconn-banner-bulma');
});

it('applies tailwind framework class when specified', function () {
    $view = $this->blade('<x-i3::uconn-banner framework="tailwind" />');

    expect((string) $view)->toContain('uconn-banner-tailwind');
});

it('defaults to bootstrap on invalid framework', function () {
    $view = $this->blade('<x-i3::uconn-banner framework="invalid" />');

    expect((string) $view)->toContain('uconn-banner-bootstrap');
});

it('renders inner content wrapper div', function () {
    $view = $this->blade('<x-i3::uconn-banner />');

    expect((string) $view)->toContain('uconn-banner-content');
});

it('renders SVG logo', function () {
    $view = $this->blade('<x-i3::uconn-banner />');

    expect((string) $view)->toContain('<svg');
    expect((string) $view)->toContain('uconn.edu');
});

it('merges additional attributes', function () {
    $view = $this->blade('<x-i3::uconn-banner class="custom-class" id="my-banner" />');

    expect((string) $view)->toContain('custom-class');
    expect((string) $view)->toContain('id="my-banner"');
});
