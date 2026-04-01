# i3 Blade Components Package

Laravel package providing shared Blade components for i3 projects.

## Package Purpose

This package allows developers across our organization to:
- Include shared UI components via Composer: `composer require i3/blade-components`
- Use standardized Blade components with the `i3::` namespace
- Maintain consistent UI patterns across multiple Laravel applications

## Architecture

**Package Type**: Laravel package using [Spatie Package Tools](https://github.com/spatie/laravel-package-tools)  
**Namespace**: `i3\i3BladeComponents\`  
**Views Namespace**: `i3::`  

```
src/
  Components/          # Component classes (when logic needed)
  i3BladeComponentsServiceProvider.php  # Package registration
resources/views/
  components/          # Blade component templates
tests/                 # ⚠️ Directory doesn't exist yet—create it when adding tests
config/               # Package configuration
```

## Build and Test Commands

```bash
composer test          # Run Pest tests
composer test-coverage # Run tests with coverage report
composer analyse       # Run PHPStan static analysis (Level 9)
composer format        # Run Laravel Pint formatter
```

**Before first commit**: Create missing config files for consistent tooling:
- `phpstan.neon` — Static analysis rules
- `pint.json` — Code style rules (Laravel preset)
- `tests/` directory with initial test structure

## Creating New Blade Components

### Simple Component (View Only)
1. Create view: `resources/views/components/component-name.blade.php`
2. Consumers use: `<x-i3::component-name />`

### Component with Logic
1. Create class: `src/Components/ComponentName.php`
   - Extend `Illuminate\View\Component`
   - Namespace: `i3\i3BladeComponents\Components`
2. Create view: `resources/views/components/component-name.blade.php`
3. Register in `i3BladeComponentsServiceProvider::bootingPackage()`:
   ```php
   Blade::component('i3::component-name', ComponentName::class);
   ```
4. Create test: `tests/Components/ComponentNameTest.php`

### Testing Components
**Framework**: Pest 4.0 with Orchestra Testbench  
**Test Pattern**:
```php
use i3\i3BladeComponents\Tests\TestCase;

it('renders the component', function () {
    $view = $this->blade('<x-i3::button>Click</x-i3::button>');
    
    expect($view)->toContain('Click');
});
```

Run `composer test` before pushing changes.

## Conventions

- **PHP 8.4+**: Use typed properties, constructor property promotion
- **Laravel 11|12 compatible**: Test against both versions when possible  
- **Component naming**: kebab-case for views (`alert-box.blade.php`), PascalCase for classes (`AlertBox.php`)
- **Props**: Use typed component properties with defaults when sensible
- **Documentation**: Add inline examples to component PHP docblocks for discoverability

## Code Quality Standards

All code must pass:
1. **Pint formatting** (Laravel preset) — `composer format`
2. **PHPStan analysis** (Level 9 + Larastan) — `composer analyse`
3. **Pest tests** with architecture rules — `composer test`

The package uses PHPStan strict rules including deprecation detection and PHPUnit assertions.
