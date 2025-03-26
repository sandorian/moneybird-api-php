---
title: Tax Rates
description: Interacting with Moneybird's Tax Rates API.
---

Retrieve tax rates from Moneybird.

## Working with Tax Rates

This section covers how to interact with Moneybird's Tax Rates API. You can retrieve tax rates from your Moneybird administration.

### Basic Operations

#### List Tax Rates

Get a paginated list of tax rates.

```php
$taxRates = $client->taxRates()->paginate();

// Iterate through the pages
foreach ($taxRates as $taxRate) {
    echo $taxRate->name . ': ' . $taxRate->percentage . '%';
}
```

#### Filtering Tax Rates

You can filter tax rates by adding query parameters to the request. For example, to filter by percentage:

```php
$request = new GetTaxRatesPageRequest;
$request->query()->add('filter', 'percentage:21');
$taxRates = $client->paginate($request);
```

Common filters include:
- `percentage:{value}` - Filter by tax percentage
- `tax_rate_type:{type}` - Filter by tax rate type
- `active:{true|false}` - Filter by active status

## Tax Rate Properties

When working with tax rates, you'll have access to the following properties:

| Property | Type | Description |
|----------|------|-------------|
| id | string | Unique identifier |
| administration_id | string | ID of the administration the tax rate belongs to |
| name | string | Name of the tax rate (e.g., "21% btw") |
| percentage | string | Tax percentage value (e.g., "21.0") |
| tax_rate_type | string | Type of tax rate (e.g., "sales_invoice") |
| show_tax | boolean | Whether to show tax on invoices |
| active | boolean | Whether the tax rate is active |
| country | string | Country code the tax rate applies to (if applicable) |
| created_at | string | ISO 8601 timestamp of when the tax rate was created |
| updated_at | string | ISO 8601 timestamp of when the tax rate was last updated |

> **Note:** See the [official API reference](https://developer.moneybird.com/api/tax_rates/) for the complete list of available properties.

## Further reading

- Read [the full API reference](https://developer.moneybird.com/api/tax_rates/) in the Moneybird developer docs
