---
title: Custom Fields
description: Interacting with Moneybird's Custom Fields API.
---

Manage your Custom Fields in Moneybird.

## Working with Custom Fields

This section covers how to interact with Moneybird's Custom Fields API. You can retrieve custom fields information.

### Basic Operations

#### Get a Custom Field

Retrieve a custom field by its ID.

```php
$customField = $client->customFields()->get('123456789');
```

#### List Custom Fields

Get a list of all custom fields.

```php
$customFields = $client->customFields()->all();

// Iterate through the custom fields
foreach ($customFields as $customField) {
    echo $customField->name;
}
```

## Custom Field Properties

When working with custom fields, you'll have access to the following properties:

| Property | Type | Description |
|----------|------|-------------|
| id | string | Unique identifier |
| administration_id | string | ID of the administration the custom field belongs to |
| name | string | Name of the custom field |
| source | string | Source of the custom field (e.g., 'sales_invoice', 'contact') |
| created_at | string | ISO 8601 timestamp of when the custom field was created |
| updated_at | string | ISO 8601 timestamp of when the custom field was last updated |

> **Note:** See the [official API reference](https://developer.moneybird.com/api/custom_fields/) for the complete list of available properties.

## Further reading

- Read [the full API reference](https://developer.moneybird.com/api/custom_fields/) in the Moneybird developer docs
