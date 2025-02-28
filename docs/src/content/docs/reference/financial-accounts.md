---
title: Financial Accounts
description: Interacting with Moneybird's Financial Accounts API.
---

Manage your Financial Accounts in Moneybird.

## Working with Financial Accounts

This section covers how to interact with Moneybird's Financial Accounts API. You can retrieve financial accounts information.

### Basic Operations

#### Get a Financial Account

Retrieve a financial account by its ID.

```php
$financialAccount = $client->financialAccounts()->get('123456789');
```

#### List Financial Accounts

Get a paginated list of financial accounts.

```php
$financialAccounts = $client->financialAccounts()->paginate();

// Iterate through the pages
foreach ($financialAccounts as $financialAccount) {
    echo $financialAccount->name;
}
```

#### Get All Financial Accounts

Get all financial accounts at once.

```php
$allFinancialAccounts = $client->financialAccounts()->all();

// Iterate through all financial accounts
foreach ($allFinancialAccounts as $financialAccount) {
    echo $financialAccount->name;
}
```

## Financial Account Properties

When working with financial accounts, you'll have access to the following properties:

| Property | Type | Description |
|----------|------|-------------|
| id | string | Unique identifier |
| administration_id | string | ID of the administration the financial account belongs to |
| type | string | Type of the financial account (e.g., 'bank', 'credit_card') |
| name | string | Name of the financial account |
| identifier | string | Identifier for the financial account (e.g., bank account number) |
| currency | string | Currency used for the financial account |
| provider | string | Provider of the financial account |
| active | boolean | Whether the financial account is active |
| created_at | string | ISO 8601 timestamp of when the financial account was created |
| updated_at | string | ISO 8601 timestamp of when the financial account was last updated |

> **Note:** See the [official API reference](https://developer.moneybird.com/api/financial_accounts/) for the complete list of available properties.

## Further reading

- Read [the full API reference](https://developer.moneybird.com/api/financial_accounts/) in the Moneybird developer docs
