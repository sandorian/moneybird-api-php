<img src="/sandorian/moneybird-api-php/raw/main/art/sandorian_logo.svg" alt="Sandorian logo">
<img src="/sandorian/moneybird-api-php/raw/main/art/moneybird_logo.svg" alt="Moneybird logo">

# Moneybird API client for PHP

[![Latest Version on Packagist](https://img.shields.io/packagist/v/sandorian/moneybird-api-php.svg?style=flat-square)](https://packagist.org/packages/sandorian/moneybird-api-php)
[![Tests](https://img.shields.io/github/actions/workflow/status/sandorian/moneybird-api-php/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/sandorian/moneybird-api-php/actions/workflows/run-tests.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/sandorian/moneybird-api-php.svg?style=flat-square)](https://packagist.org/packages/sandorian/moneybird-api-php)

Effortlessly interact with the Moneybird API using your favourite language PHP.

This package is based on the popular and robust [Saloon PHP](https://docs.saloon.dev) package.

## Installation

You can install the Moneybird PHP client via composer:

```bash
composer require sandorian/moneybird-api-php
```

## Usage

```php
use Sandorian\Moneybird\Api\MoneybirdApiClient;

// 1. Authentication
$moneybird = new Moneybird('your_key_here', 'your_administration_id_here');

// 2. Making api requests
$response = $moneybird->contacts()->create([
    'company_name' => 'Sandorian Consultancy B.V.',
    'contact_country' => 'NL',
]);
```

## Testing

```bash
composer test
```

## Changelog

Check the releases for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/spatie/.github/blob/main/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Sandorian.com](https://www.sandorian.com)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
