# i3 Blade Components

[![Latest Version on Packagist](https://img.shields.io/packagist/v/i3/blade-components.svg?style=flat-square)](https://packagist.org/packages/i3/blade-components)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/i3/blade-components/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/i3/blade-components/actions?query=workflow%3Arun-tests+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/i3/blade-components.svg?style=flat-square)](https://packagist.org/packages/i3/blade-components)

Shared Laravel Blade components for i3 projects. Include this package via Composer to get a consistent set of UI components across all i3 applications.

## Installation

```bash
composer require i3/blade-components
```

The service provider is auto-discovered by Laravel. No additional setup is required.

Optionally, publish the config file:

```bash
php artisan vendor:publish --tag="i3-config"
```

Optionally, publish the views to customize them in your application:

```bash
php artisan vendor:publish --tag="i3-views"
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

## Adding Components

See `.github/copilot-instructions.md` for conventions. Use the `/create-blade-component` Copilot prompt to scaffold new components including the view, optional class, and test in one step.

## Testing

```bash
composer test
```

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
