# Data Encapsulation in Moneybird API

## Overview

When interacting with the Moneybird API, data for most endpoints needs to be encapsulated within a specific key that matches the singular name of the resource. This is a requirement from the Moneybird API and must be handled consistently throughout this package.

## Examples

### Contacts

When creating or updating a contact, the data must be encapsulated within a `contact` key:

```php
// Correct way to create a contact
$contact = $moneybirdApiClient->contacts()->create([
    'contact' => [
        'company_name' => 'Acme Corporation',
        'firstname' => 'John',
        'lastname' => 'Doe',
        // other contact properties
    ]
]);

// Incorrect way - will result in a 400 Bad Request
$contact = $moneybirdApiClient->contacts()->create([
    'company_name' => 'Acme Corporation',
    'firstname' => 'John',
    'lastname' => 'Doe',
]);
```

### Other Resources

This pattern applies to all resources in the Moneybird API. The data must be encapsulated within a key that matches the singular name of the resource:

- `contact` for Contacts
- `sales_invoice` for Sales Invoices
- `estimate` for Estimates
- `product` for Products
- etc.

## Implementation

This package handles the encapsulation automatically, so you don't need to manually wrap your data. Simply provide the properties directly, and the package will handle the proper encapsulation before sending the request to the Moneybird API.

```php
// The package handles encapsulation automatically
$contact = $moneybirdApiClient->contacts()->create([
    'company_name' => 'Acme Corporation',
    'firstname' => 'John',
    'lastname' => 'Doe',
]);
```

This ensures that your code remains clean and follows the expected patterns for PHP API clients, while still meeting the requirements of the Moneybird API.
