---
title: Ledger Accounts
description: Interacting with Moneybird's Ledger Accounts API.
---

Manage your Ledger Accounts in Moneybird.

## Working with Ledger Accounts

This section covers how to interact with Moneybird's Ledger Accounts API. You can create, retrieve, update, and delete ledger accounts.

### Basic Operations

#### Get a Ledger Account

Retrieve a ledger account by its ID.

```php
$ledgerAccount = $client->ledgerAccounts()->get('123456789');
```

#### List Ledger Accounts

Get a paginated list of ledger accounts.

```php
$ledgerAccounts = $client->ledgerAccounts()->paginate();

// Iterate through the pages
foreach ($ledgerAccounts as $ledgerAccount) {
    echo $ledgerAccount->name;
}
```

#### Get All Ledger Accounts

Get all ledger accounts at once.

```php
$allLedgerAccounts = $client->ledgerAccounts()->all();

// Iterate through all ledger accounts
foreach ($allLedgerAccounts as $ledgerAccount) {
    echo $ledgerAccount->name;
}
```

#### Create a Ledger Account

Create a new ledger account.

```php
$data = [
    'name' => 'Office Supplies',
    'account_type' => 'expense',
    'account_id' => '4000',
    'description' => 'For tracking office supply expenses'
];

$ledgerAccount = $client->ledgerAccounts()->create($data);
```

#### Update a Ledger Account

Update an existing ledger account.

```php
$updateData = [
    'name' => 'Office Supplies and Equipment',
    'description' => 'For tracking office supply and equipment expenses'
];

$ledgerAccount = $client->ledgerAccounts()->update('123456789', $updateData);
```

#### Delete a Ledger Account

Delete a ledger account.

```php
$client->ledgerAccounts()->delete('123456789');
```

## Ledger Account Properties

When working with ledger accounts, you'll have access to the following properties:

| Property | Type | Description |
|----------|------|-------------|
| id | string | Unique identifier |
| administration_id | string | ID of the administration the ledger account belongs to |
| name | string | Name of the ledger account |
| account_type | string | Type of account (e.g., 'expense', 'revenue', 'asset') |
| account_id | string | Account ID or code |
| parent | boolean | Whether this is a parent account |
| allowed_document_types | boolean | Document types allowed for this account |
| description | string | Description of the ledger account |
| created_at | string | ISO 8601 timestamp of when the ledger account was created |
| updated_at | string | ISO 8601 timestamp of when the ledger account was last updated |

> **Note:** See the [official API reference](https://developer.moneybird.com/api/ledger_accounts/) for the complete list of available properties.

## Further reading

- Read [the full API reference](https://developer.moneybird.com/api/ledger_accounts/) in the Moneybird developer docs
