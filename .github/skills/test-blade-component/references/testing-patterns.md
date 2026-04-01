# Blade Component Testing Patterns

Concrete examples for each test area. Reference this file from [SKILL.md](../SKILL.md) procedures.

---

## TestCase Setup

Every test file depends on `tests/TestCase.php`. Create this once:

```php
<?php

namespace i3\i3BladeComponents\Tests;

use i3\i3BladeComponents\i3BladeComponentsServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [
            i3BladeComponentsServiceProvider::class,
        ];
    }
}
```

---

## Basic Rendering

The simplest possible test — ensures the component renders without throwing:

```php
it('renders without errors', function () {
    $view = $this->blade('<x-i3::button />');

    expect($view)->not->toBeEmpty();
});
```

To capture rendered HTML for inspection:

```php
it('renders expected markup', function () {
    $view = $this->blade('<x-i3::button>Save</x-i3::button>');

    expect((string) $view)->toContain('<button')
        ->toContain('Save')
        ->toContain('</button>');
});
```

---

## Prop Validation

### Default values

Render without any props — assert the default CSS class or attribute appears:

```php
it('applies primary variant by default', function () {
    $view = $this->blade('<x-i3::button />');

    expect($view)->toContain('btn-primary');
});
```

### Override defaults

```php
it('applies danger variant when specified', function () {
    $view = $this->blade('<x-i3::button variant="danger" />');

    expect($view)
        ->toContain('btn-danger')
        ->not->toContain('btn-primary');
});
```

### Attribute merging

Blade components use `$attributes->merge()` — test that caller-provided attributes are not silently dropped:

```php
it('merges caller attributes onto the root element', function () {
    $view = $this->blade(
        '<x-i3::button id="submit-btn" data-testid="save" />'
    );

    expect($view)
        ->toContain('id="submit-btn"')
        ->toContain('data-testid="save"');
});
```

---

## Slot Rendering

### Default slot

```php
it('renders content in the default slot', function () {
    $view = $this->blade(
        '<x-i3::card>Card body</x-i3::card>'
    );

    expect($view)->toContain('Card body');
});
```

### Named slots

```php
it('renders the header named slot', function () {
    $view = $this->blade(
        '<x-i3::card>
            <x-slot name="header">Card Title</x-slot>
            Card body
        </x-i3::card>'
    );

    expect($view)
        ->toContain('Card Title')
        ->toContain('Card body');
});
```

### Conditional (optional) slots

If a slot is only rendered when provided, assert its wrapper is absent when omitted:

```php
it('hides the footer section when no footer slot provided', function () {
    $view = $this->blade('<x-i3::card>Body</x-i3::card>');

    // Assert the footer wrapper element is not rendered
    expect($view)->not->toContain('card-footer');
});

it('shows the footer section when footer slot is provided', function () {
    $view = $this->blade(
        '<x-i3::card>
            Body
            <x-slot name="footer">Actions</x-slot>
        </x-i3::card>'
    );

    expect($view)
        ->toContain('card-footer')
        ->toContain('Actions');
});
```

---

## Accessibility

### Passthrough aria-* attributes

Components using `$attributes->merge()` automatically pass through `aria-*` attributes:

```php
it('passes through aria-label to the root element', function () {
    $view = $this->blade(
        '<x-i3::button aria-label="Close dialog" />'
    );

    expect($view)->toContain('aria-label="Close dialog"');
});
```

### Hardcoded ARIA roles

When a component always renders a specific role (e.g. an alert):

```php
it('renders with role="alert" for screen readers', function () {
    $view = $this->blade('<x-i3::alert>Warning</x-i3::alert>');

    expect($view)->toContain('role="alert"');
});
```

### Disabled state

```php
it('marks the button as disabled when disabled prop is true', function () {
    $view = $this->blade('<x-i3::button :disabled="true" />');

    expect($view)->toContain('disabled');
    expect($view)->toContain('aria-disabled="true"');
});
```

---

## Variants / Theming

Map every declared variant to its expected output class. Read `src/Components/{Name}.php` to enumerate valid variant values, then test each:

```php
dataset('button variants', [
    ['primary',   'btn-primary'],
    ['secondary', 'btn-secondary'],
    ['danger',    'btn-danger'],
    ['ghost',     'btn-ghost'],
]);

it('applies the correct class for each variant', function (string $variant, string $expectedClass) {
    $view = $this->blade("<x-i3::button variant=\"{$variant}\" />");

    expect($view)->toContain($expectedClass);
})->with('button variants');
```

For dark mode, pass a `dark` prop or add a `dark:` class and assert:

```php
it('includes dark mode classes', function () {
    $view = $this->blade('<x-i3::button variant="primary" />');

    expect($view)->toContain('dark:bg-blue-700');
});
```

---

## Architecture Tests

`arch()` assertions run at the file level (outside `describe()`). They enforce structural rules across the entire `Components` namespace — a single assertion covers all current and future components:

```php
arch('component classes extend Illuminate\\View\\Component')
    ->expect('i3\i3BladeComponents\Components')
    ->toExtend('Illuminate\View\Component');

arch('component classes do not use database or HTTP facades')
    ->expect('i3\i3BladeComponents\Components')
    ->not->toUse([
        'Illuminate\Support\Facades\DB',
        'Illuminate\Support\Facades\Http',
        'Illuminate\Support\Facades\Cache',
        'Illuminate\Support\Facades\Queue',
    ]);

arch('component classes are readonly-friendly')
    ->expect('i3\i3BladeComponents\Components')
    ->not->toHavePublicMethods(); // only render() should be public; adjust as needed
```

> Note: Architecture tests fail silently if the namespace contains no classes. They activate as soon as the first component class is added.
