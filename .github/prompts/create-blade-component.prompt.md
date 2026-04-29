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
@include('i3::components._styles')

@props([])

<div {{ $attributes->merge(['class' => '']) }}>
    {{ $slot }}
</div>
```

**Class-based template** — reference each prop as a `$variable`. Add `@props` with props and their defaults so the view is self-documenting:
```blade
@include('i3::components._styles')

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

    expect((string) $view)->toContain('Hello');
});

// Add prop, slot, and variant tests as relevant
```

> **Note**: `$this->blade()` returns a `TestView` object. Always cast to `(string) $view` before using string matchers like `toContain()`.

For a class-based component, also add prop and variant tests. See the `/test-blade-component` skill for a full multi-pattern test scaffold.

---

## Step 5 — Add to component gallery

### 5a — Create the preview file

Create `workbench/resources/views/previews/{kebab-name}.blade.php` with labeled variant examples:

```blade
{{-- Variant: with slot content --}}
<div class="space-y-6">
    <div>
        <p class="text-xs font-medium text-gray-400 uppercase tracking-wide mb-2">With slot content</p>
        <x-i3::{kebab-name}>
            Example content
        </x-i3::{kebab-name}>
    </div>

    <div>
        <p class="text-xs font-medium text-gray-400 uppercase tracking-wide mb-2">Empty (no slot)</p>
        <x-i3::{kebab-name} />
    </div>

    <div>
        <p class="text-xs font-medium text-gray-400 uppercase tracking-wide mb-2">With extra attributes</p>
        <x-i3::{kebab-name} class="text-blue-600 font-semibold">
            Styled via attributes
        </x-i3::{kebab-name}>
    </div>
</div>
```

For class-based components, add a labeled variant for each meaningful prop value.

### 5b — Register in the gallery route

Open `workbench/routes/web.php` and add an entry to the `$components` array:

```php
$components = [
    // existing entries...
    '{kebab-name}' => '{Component Display Name}',
];
```

The gallery is viewable via `composer serve` at `http://127.0.0.1:8000`.

---

## Step 6 — Create the component CSS file

Create `resources/css/components/{kebab-name}.css` with a scoped comment header:

```css
/* {kebab-name} component styles */
```

Then add an import line to `resources/css/i3-blade-components.css`:

```css
@import "./components/{kebab-name}.css";
```

Rebuild the compiled stylesheet:

```bash
npm run build
```

This updates `resources/dist/i3-blade-components.css` (committed to the repo so consumers don't need Node).

---

## Step 7 — Format

Run `composer format` to normalize all generated files before finishing.
