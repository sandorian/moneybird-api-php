---
title: Financial Statements
description: Interacting with Moneybird's Financial Statements API.
---

Manage your Financial Statements in Moneybird.

## Working with Financial Statements

This section covers how to interact with Moneybird's Financial Statements API. You can create, retrieve, update, and delete financial statements.

### Basic Operations

#### Get a Financial Statement

Retrieve a financial statement by its ID.

```php
$financialStatement = $client->financialStatements()->get('123456789');
```

#### List Financial Statements

Get a paginated list of financial statements.

```php
$financialStatements = $client->financialStatements()->paginate();

// Iterate through the pages
foreach ($financialStatements as $financialStatement) {
    echo $financialStatement->reference;
}
```

#### Get All Financial Statements

Get all financial statements at once.

```php
$allFinancialStatements = $client->financialStatements()->all();

// Iterate through all financial statements
foreach ($allFinancialStatements as $financialStatement) {
    echo $financialStatement->reference;
}
```

#### Create a Financial Statement

Create a new financial statement.

```php
$data = [
    'financial_account_id' => '123456789',
    'reference' => 'Bank Statement March 2025',
    'official_date' => '2025-03-31',
    'official_balance' => '5000.00'
];

$financialStatement = $client->financialStatements()->create($data);
```

#### Update a Financial Statement

Update an existing financial statement.

```php
$updateData = [
    'reference' => 'Bank Statement March 2025 - Updated',
    'official_balance' => '5100.00'
];

$financialStatement = $client->financialStatements()->update('123456789', $updateData);
```

#### Delete a Financial Statement

Delete a financial statement.

```php
$client->financialStatements()->delete('123456789');
```

### Specialized Features

#### Synchronize Financial Statements

Synchronize a list of financial statements by their IDs.

```php
$ids = ['123456789', '987654321'];
$financialStatements = $client->financialStatements()->synchronize($ids);
```

## Financial Statement Properties

When working with financial statements, you'll have access to the following properties:

| Property | Type | Description |
|----------|------|-------------|
| id | string | Unique identifier |
| administration_id | string | ID of the administration the financial statement belongs to |
| financial_account_id | string | ID of the financial account associated with this statement |
| reference | string | Reference or name for the financial statement |
| official_date | string | Official date of the statement (YYYY-MM-DD) |
| official_balance | string | Official balance amount |
| importer_service | string | Service used to import the statement |
| financial_account_name | string | Name of the associated financial account |
| financial_mutations | array | Associated financial mutations |
| created_at | string | ISO 8601 timestamp of when the financial statement was created |
| updated_at | string | ISO 8601 timestamp of when the financial statement was last updated |

> **Note:** See the [official API reference](https://developer.moneybird.com/api/financial_statements/) for the complete list of available properties.

## Further reading

- Read [the full API reference](https://developer.moneybird.com/api/financial_statements/) in the Moneybird developer docs
