---
description: "Scaffold a new Blade component: generates view, optional component class, and Pest test. Use when creating, adding, or generating a new blade component for the package."
agent: "agent"
argument-hint: "ComponentName [prop:type prop:type=default ...]"
---

Scaffold a new Blade component for the i3 blade-components package. Follow the conventions in [copilot-instructions.md](../copilot-instructions.md).

## Input Parsing

The argument is: `ComponentName [prop:type prop:type=default ...]`

- **ComponentName**: PascalCase class name → also derive the kebab-case view name (e.g. `AlertBox` → `alert-box`)
- **props**: optional list of `prop:type` or `prop:type=default` pairs (e.g. `variant:string=primary` `disabled:bool=false`)

**Decision**:
- No props provided → **view-only component** (no PHP class)
- Props provided → **class-based component** (PHP class + view)

---

## Step 1 — Create the view

Create `resources/views/components/{kebab-name}.blade.php`.

**View-only template:**
```blade
@props([])

<div {{ $attributes->merge(['class' => '']) }}>
    {{ $slot }}
</div>
```

**Class-based template** — reference each prop as a `$variable`. Add `@props` with props and their defaults so the view is self-documenting:
```blade
@props(['variant' => 'primary'])

<div {{ $attributes->merge(['class' => $variant]) }}>
    {{ $slot }}
</div>
```

---

## Step 2 — Create the component class (class-based only)

Create `src/Components/{ComponentName}.php`:

```php
<?php

namespace i3\i3BladeComponents\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class {ComponentName} extends Component
{
    public function __construct(
        public readonly string $variant = 'primary',
        // add remaining typed props here
    ) {}

    public function render(): View
    {
        return view('i3::components.{kebab-name}');
    }
}
```

Rules:
- PHP 8.4 constructor property promotion with `public readonly` for immutable props
- Type every prop; apply defaults where specified in the argument
- No docblocks on generated stubs unless a prop requires explanation

---

## Step 3 — Register the component (class-based only)

Open `src/i3BladeComponentsServiceProvider.php`. Add a `bootingPackage()` method if absent, then register the component:

```php
use Illuminate\Support\Facades\Blade;
use i3\i3BladeComponents\Components\{ComponentName};

public function bootingPackage(): void
{
    Blade::component('i3::{kebab-name}', {ComponentName}::class);
}
```

If `bootingPackage()` already exists, add the `Blade::component()` call inside it.

---

## Step 4 — Create the test

### 4a — Bootstrap TestCase (first time only)

If `tests/TestCase.php` does not exist, create it:

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

### 4b — Component test file

Create `tests/Components/{ComponentName}Test.php`:

```php
<?php

namespace i3\i3BladeComponents\Tests\Components;

use i3\i3BladeComponents\Tests\TestCase;

uses(TestCase::class);

it('renders without errors', function () {
    $view = $this->blade('<x-i3::{kebab-name} />');

    expect($view)->not->toBeEmpty();
});

it('renders slot content', function () {
    $view = $this->blade(
        '<x-i3::{kebab-name}>Hello</x-i3::{kebab-name}>'
    );

    expect($view)->toContain('Hello');
});

// Add prop, slot, and variant tests as relevant
```

For a class-based component, also add prop and variant tests. See the `/test-blade-component` skill for a full multi-pattern test scaffold.

---

## Step 5 — Format

Run `composer format` to normalize all generated files before finishing.
