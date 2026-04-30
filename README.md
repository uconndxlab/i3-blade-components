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
<x-i3::powered-by>
    Powered by i3
</x-i3::powered-by>
```

### Available Components

| Component | Tag | Description |
|---|---|---|
| PoweredBy | `<x-i3::powered-by>` | Generic wrapper for "powered by" attribution |

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
