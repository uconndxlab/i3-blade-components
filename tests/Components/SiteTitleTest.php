<?php

namespace i3\i3BladeComponents\Tests\Components;

use i3\i3BladeComponents\Tests\TestCase;

uses(TestCase::class);

describe('SiteTitle rendering', function () {
    it('renders the title and subheader', function () {
        $view = $this->blade(
            '<x-i3::site-title title="Digital Experience" subheader="University of Connecticut" />'
        );

        expect((string) $view)
            ->toContain('Digital Experience')
            ->toContain('University of Connecticut')
            ->toContain('i3-blade-components.css');
    });

    it('escapes title and subheader content', function () {
        $view = $this->blade(
            '<x-i3::site-title :title="$title" :subheader="$subheader" />',
            [
                'title' => '<script>alert("title")</script>',
                'subheader' => '<script>alert("subheader")</script>',
            ],
        );

        expect((string) $view)
            ->not->toContain('<script>')
            ->toContain('&lt;script&gt;');
    });
});

describe('SiteTitle props', function () {
    it('renders optional title and subheader links', function () {
        $view = $this->blade(
            '<x-i3::site-title title="Digital Experience" subheader="UConn" title-url="/home" subheader-url="https://uconn.edu" />'
        );

        expect((string) $view)
            ->toContain('href="/home"')
            ->toContain('href="https://uconn.edu"');
    });

    it('renders text without anchors when URLs are omitted', function () {
        $view = $this->blade(
            '<x-i3::site-title title="Digital Experience" subheader="UConn" />'
        );

        expect((string) $view)->not->toContain('<a ');
    });

    it('merges additional HTML attributes onto the root element', function () {
        $view = $this->blade(
            '<x-i3::site-title title="Digital Experience" subheader="UConn" id="site-heading" class="extra" aria-label="Site identity" />'
        );

        expect((string) $view)
            ->toContain('id="site-heading"')
            ->toContain('site-title extra')
            ->toContain('aria-label="Site identity"');
    });
});

describe('SiteTitle slots', function () {
    it('renders right-aligned slot content', function () {
        $view = $this->blade(
            '<x-i3::site-title title="Digital Experience" subheader="UConn">
                <x-slot:right><a href="/apply">Apply now</a></x-slot:right>
            </x-i3::site-title>'
        );

        expect((string) $view)
            ->toContain('site-title__right')
            ->toContain('href="/apply"')
            ->toContain('Apply now');
    });

    it('omits the right slot wrapper when no content is provided', function () {
        $view = $this->blade(
            '<x-i3::site-title title="Digital Experience" subheader="UConn" />'
        );

        expect((string) $view)->not->toContain('site-title__right');
    });
});

describe('SiteTitle containment', function () {
    it('defaults to bootstrap containment', function () {
        $view = $this->blade(
            '<x-i3::site-title title="Digital Experience" subheader="UConn" />'
        );

        expect((string) $view)->toContain('site-title-container-bootstrap');
    });

    it('supports framework containment', function (string $framework) {
        $view = $this->blade(
            '<x-i3::site-title title="Digital Experience" subheader="UConn" :framework="$framework" />',
            ['framework' => $framework],
        );

        expect((string) $view)->toContain("site-title-container-{$framework}");
    })->with(['bootstrap', 'bulma', 'tailwind']);

    it('defaults to bootstrap containment for an unsupported framework', function () {
        $view = $this->blade(
            '<x-i3::site-title title="Digital Experience" subheader="UConn" framework="unknown" />'
        );

        expect((string) $view)->toContain('site-title-container-bootstrap');
    });

    it('replaces framework containment with a custom class', function () {
        $view = $this->blade(
            '<x-i3::site-title title="Digital Experience" subheader="UConn" framework="bulma" container-class="project-container" />'
        );

        expect((string) $view)
            ->toContain('site-title__content project-container')
            ->not->toContain('site-title-container-bulma');
    });
});

arch('site title component does not use database, HTTP, cache, or queue facades')
    ->expect('i3\i3BladeComponents\Components\SiteTitle')
    ->not->toUse([
        'Illuminate\Support\Facades\DB',
        'Illuminate\Support\Facades\Http',
        'Illuminate\Support\Facades\Cache',
        'Illuminate\Support\Facades\Queue',
    ]);
