---
title: Import Mappings
description: Interacting with Moneybird's Import Mappings API.
---

Manage your Import Mappings in Moneybird.

## Working with Import Mappings

This section covers how to interact with Moneybird's Import Mappings API. You can create, retrieve, update, and delete import mappings.

### Basic Operations

#### Get an Import Mapping

Retrieve an import mapping by its ID.

```php
$importMapping = $client->importMappings()->get('123456789');
```

#### List Import Mappings

Get a paginated list of import mappings.

```php
$importMappings = $client->importMappings()->paginate();

// Iterate through the pages
foreach ($importMappings as $importMapping) {
    echo $importMapping->name;
}
```

#### Get All Import Mappings

Get all import mappings at once.

```php
$allImportMappings = $client->importMappings()->all();

// Iterate through all import mappings
foreach ($allImportMappings as $importMapping) {
    echo $importMapping->name;
}
```

#### Create an Import Mapping

Create a new import mapping.

```php
$data = [
    'name' => 'Bank Import Mapping',
    'entity_type' => 'FinancialMutation',
    'default_ledger_account_id' => '123456',
    'default_tax_rate_id' => '789012',
    'mapping_attributes' => [
        [
            'key' => 'description',
            'value' => 'Rent',
            'ledger_account_id' => '345678'
        ]
    ]
];

$importMapping = $client->importMappings()->create($data);
```

#### Update an Import Mapping

Update an existing import mapping.

```php
$updateData = [
    'name' => 'Updated Bank Import Mapping',
    'default_ledger_account_id' => '234567'
];

$importMapping = $client->importMappings()->update('123456789', $updateData);
```

#### Delete an Import Mapping

Delete an import mapping.

```php
$client->importMappings()->delete('123456789');
```

## Import Mapping Properties

When working with import mappings, you'll have access to the following properties:

| Property | Type | Description |
|----------|------|-------------|
| id | string | Unique identifier |
| administration_id | string | ID of the administration the import mapping belongs to |
| name | string | Name of the import mapping |
| entity_type | string | Type of entity this mapping applies to (e.g., 'FinancialMutation') |
| default_ledger_account_id | string | ID of the default ledger account |
| default_tax_rate_id | string | ID of the default tax rate |
| mapping_attributes | array | Mapping rules for specific values |
| created_at | string | ISO 8601 timestamp of when the import mapping was created |
| updated_at | string | ISO 8601 timestamp of when the import mapping was last updated |

> **Note:** See the [official API reference](https://developer.moneybird.com/api/import_mappings/) for the complete list of available properties.

## Further reading

- Read [the full API reference](https://developer.moneybird.com/api/import_mappings/) in the Moneybird developer docs
