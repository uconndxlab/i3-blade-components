---
name: test-blade-component
description: 'Write comprehensive Pest tests for a Blade component in the i3 blade-components package. Use when testing, verifying, adding tests, checking coverage, or reviewing a blade component for props, slots, accessibility, variants, and architecture.'
argument-hint: "ComponentName"
---

# Blade Component Testing

## When to Use

Use this skill when writing or expanding Pest tests for any component in this package, covering all quality areas: rendering, props, slots, accessibility, variants, and architecture.

## Procedure

### 1. Locate the component

Find the component files:
- View: `resources/views/components/{kebab-name}.blade.php`
- Class (if exists): `src/Components/{ClassName}.php`

Read both files. Identify: prop names and types, named slots, variant values, conditional rendering, ARIA attributes.

### 2. Ensure the TestCase base exists

Check for `tests/TestCase.php`. If absent, create it — see [testing-patterns.md](./references/testing-patterns.md#testcase-setup).

### 3. Create or open the test file

Path: `tests/Components/{ClassName}Test.php`

Use [test-template.php](./assets/test-template.php) as the starting scaffold. Copy it, then replace `{ComponentName}` and `{kebab-name}` with actual values.

### 4. Fill in each test section

Work through each `describe()` block:

| Section | What to test |
|---|---|
| **Basic rendering** | Renders without errors; outputs slot content |
| **Prop validation** | Default values applied; custom values accepted; extra attributes merged |
| **Slot rendering** | Default slot; each named slot; optional slot absent when not provided |
| **Accessibility** | ARIA roles, labels, and any `aria-*` passthrough |
| **Variants** | Each declared variant produces the correct CSS class(es) |
| **Architecture** | Component class calls no DB, HTTP, or Cache facades |

Inspect the view template to discover the exact CSS classes applied per variant and the expected ARIA structure. See [testing-patterns.md](./references/testing-patterns.md) for concrete examples by pattern.

### 5. Run and verify

```bash
composer test
```

All assertions must pass before finishing. If a section is not applicable to the component (e.g. view-only has no prop section), omit that `describe()` block rather than leaving it empty.

## Conventions

- Tests live in `tests/Components/`
- Base namespace: `i3\i3BladeComponents\Tests\`
- Use `uses(TestCase::class)` at the top of each file — do NOT use `extends`
- Group related assertions with `describe()` for readable output
- `arch()` tests live at the file level (outside `describe()`), not inside `it()`
