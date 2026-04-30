# i3 Blade Components

Shared Laravel Blade components for i3 projects. Include this package via Composer to get a consistent set of UI components across all i3 applications.

## Installation

Because this package is not published to Packagist, add the Git repository as a Composer VCS repository, then require the package.

### One-Time Composer Config

```bash
composer config repositories.i3-blade-components vcs https://github.com/uconndxlab/i3-blade-components.git
composer require i3/blade-components:dev-main
```

### composer.json Example

```json
{
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/uconndxlab/i3-blade-components.git"
        }
    ],
    "require": {
        "i3/blade-components": "dev-main"
    }
}
```

The service provider is auto-discovered by Laravel. No additional setup is required.

Optionally, publish the config file:

```bash
php artisan vendor:publish --tag="blade-components-config"
```

Optionally, publish the views to customize them in your application:

```bash
php artisan vendor:publish --tag="blade-components-views"
```

## Usage

All components are available under the `i3::` namespace:

```blade
<x-i3::powered-by class="my-4" />

<x-i3::uconn-banner class="text-blue-600 font-semibold" id="uconn-banner-demo">
    UConn Banner Content
</x-i3::uconn-banner>
```

### Available Components

| Component | Tag | Description |
|---|---|---|
| PoweredBy | `<x-i3::powered-by>` | Branded "Powered by i3" lockup with SVG mark and link to i3 |
| UConnBanner | `<x-i3::uconn-banner>` | Responsive banner wrapper with framework-aware breakpoints. Supports Bootstrap, Bulma, and Tailwind CSS |

### UConn Banner — Framework-Aware Responsive Breakpoints

The `uconn-banner` component includes built-in responsive max-width constraints that automatically adapt to your CSS framework. This ensures the banner's content respects your framework's container breakpoints across all screen sizes.

**Supported Frameworks:**
- `bootstrap` (Bootstrap 5.3) — **default**
- `bulma` (Bulma CSS framework)
- `tailwind` (Tailwind CSS)

The component defaults to Bootstrap if an unrecognized framework is specified.

**Usage Examples:**

```blade
{{-- Bootstrap (default) --}}
<x-i3::uconn-banner />

{{-- Bulma breakpoints --}}
<x-i3::uconn-banner framework="bulma" />

{{-- Tailwind CSS breakpoints --}}
<x-i3::uconn-banner framework="tailwind" />

{{-- With additional attributes --}}
<x-i3::uconn-banner framework="bulma" class="my-custom-class" id="my-banner" />
```

**Responsive Behavior:**

The banner's content width automatically adjusts at these breakpoints for each framework:

- **Bootstrap 5.3**: 576px (540px), 768px (720px), 992px (960px), 1200px (1140px), 1400px (1320px)
- **Bulma**: 769px (960px), 1024px (960px), 1216px (1152px), 1408px (1344px)
- **Tailwind CSS**: 640px (640px), 768px (768px), 1024px (1024px), 1280px (1280px), 1536px (1536px)

## Previewing Components Locally

This package includes an [Orchestra Workbench](https://github.com/orchestral/testbench) dev server for browsing components in the browser.

```bash
composer build   # First time only — creates the SQLite db and publishes assets
composer serve   # Start the dev server at http://127.0.0.1:8000
```

To export the workbench gallery as a static site locally:

```bash
php vendor/bin/testbench workbench:export-static --path=build/workbench-preview
```

This generates:
- `build/workbench-preview/index.html`
- `build/workbench-preview/i3-blade-components.css`

The gallery is a single scrollable page with all components and their variants. The sidebar links jump to each component section.

To add a new component to the gallery:
1. Create `workbench/resources/views/previews/{kebab-name}.blade.php` with labeled variant examples
2. Add `'kebab-name' => 'Display Name'` to the `$components` array in `workbench/routes/web.php`

## Adding Components

See `.github/copilot-instructions.md` for conventions. Use the `/create-blade-component` Copilot prompt to scaffold new components including the view, optional class, test, and workbench preview in one step.

## Testing

```bash
composer test
```

## Preview Deployment

GitHub Pages deployment is automated by `.github/workflows/publish-workbench-preview.yml`.

- Trigger: push to `main`
- Build: installs Composer and npm dependencies, runs `composer build`, and exports static preview files
- Deploy: publishes `build/workbench-preview` to GitHub Pages

If this repository is configured as a project site, the preview URL is:

`https://uconndxlab.github.io/i3-blade-components/`

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Components live in `resources/views/components/`. Class-based components with props go in `src/Components/` and must be registered in `i3BladeComponentsServiceProvider`.

All contributions must pass:
- `composer format` — Laravel Pint code style
- `composer analyse` — PHPStan Level 9
- `composer test` — Pest test suite

## Credits

- [Brian Daley](https://github.com/bdaley)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
