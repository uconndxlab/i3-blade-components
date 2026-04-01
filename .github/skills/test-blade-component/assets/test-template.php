<?php

// Replace {ComponentName} and {kebab-name} with real values before using.

namespace i3\i3BladeComponents\Tests\Components;

use i3\i3BladeComponents\Tests\TestCase;

uses(TestCase::class);

// ── Basic rendering ──────────────────────────────────────────────────────────

describe('{ComponentName} rendering', function () {
    it('renders without errors', function () {
        $view = $this->blade('<x-i3::{kebab-name} />');

        expect($view)->not->toBeEmpty();
    });

    it('renders default slot content', function () {
        $view = $this->blade(
            '<x-i3::{kebab-name}>Hello</x-i3::{kebab-name}>'
        );

        expect($view)->toContain('Hello');
    });
});

// ── Prop validation ──────────────────────────────────────────────────────────

describe('{ComponentName} props', function () {
    it('applies default prop values when none provided', function () {
        $view = $this->blade('<x-i3::{kebab-name} />');

        // Replace 'default-value' with the actual default class or attribute output
        expect($view)->toContain('default-value');
    });

    it('accepts custom prop values', function () {
        $view = $this->blade('<x-i3::{kebab-name} variant="danger" />');

        expect($view)->toContain('danger');
    });

    it('merges additional HTML attributes', function () {
        $view = $this->blade(
            '<x-i3::{kebab-name} id="my-id" class="extra" />'
        );

        expect($view)
            ->toContain('id="my-id"')
            ->toContain('extra');
    });
});

// ── Slot rendering ───────────────────────────────────────────────────────────

describe('{ComponentName} slots', function () {
    it('renders a named slot', function () {
        $view = $this->blade(
            '<x-i3::{kebab-name}>
                <x-slot name="header">Title</x-slot>
                Body
            </x-i3::{kebab-name}>'
        );

        expect($view)
            ->toContain('Title')
            ->toContain('Body');
    });

    it('omits optional slot wrapper when slot is not provided', function () {
        $view = $this->blade('<x-i3::{kebab-name} />');

        // Replace 'slot-wrapper-class' with the actual class used on the optional wrapper
        expect($view)->not->toContain('slot-wrapper-class');
    });
});

// ── Accessibility ────────────────────────────────────────────────────────────

describe('{ComponentName} accessibility', function () {
    it('passes through aria-label attribute', function () {
        $view = $this->blade(
            '<x-i3::{kebab-name} aria-label="Descriptive label" />'
        );

        expect($view)->toContain('aria-label="Descriptive label"');
    });

    it('renders the correct ARIA role', function () {
        $view = $this->blade('<x-i3::{kebab-name} />');

        // Uncomment and adjust as appropriate:
        // expect($view)->toContain('role="alert"');
        // expect($view)->toContain('role="dialog"');
        expect($view)->not->toBeEmpty();
    });
});

// ── Variants ─────────────────────────────────────────────────────────────────

describe('{ComponentName} variants', function () {
    it('applies correct classes for primary variant', function () {
        $view = $this->blade('<x-i3::{kebab-name} variant="primary" />');

        // Replace with actual CSS class(es) for the primary variant
        expect($view)->toContain('primary-class');
    });

    it('applies correct classes for danger variant', function () {
        $view = $this->blade('<x-i3::{kebab-name} variant="danger" />');

        // Replace with actual CSS class(es) for the danger variant
        expect($view)->toContain('danger-class');
    });
});

// ── Architecture ─────────────────────────────────────────────────────────────

arch('component classes do not use database, HTTP, or cache facades')
    ->expect('i3\i3BladeComponents\Components')
    ->not->toUse([
        'Illuminate\Support\Facades\DB',
        'Illuminate\Support\Facades\Http',
        'Illuminate\Support\Facades\Cache',
        'Illuminate\Support\Facades\Queue',
    ]);
