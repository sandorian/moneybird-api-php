---
title: Purchase Transactions
description: Interacting with Moneybird's Purchase Transactions API.
---

Manage your Purchase Transactions in Moneybird.

## Working with Purchase Transactions

This section covers how to interact with Moneybird's Purchase Transactions API. You can create, retrieve, update, and delete purchase transactions.

### Basic Operations

#### Get a Purchase Transaction

Retrieve a purchase transaction by its ID.

```php
$purchaseTransaction = $client->purchaseTransactions()->get('123456789');
```

#### List Purchase Transactions

Get a paginated list of purchase transactions.

```php
$purchaseTransactions = $client->purchaseTransactions()->paginate();

// Iterate through the pages
foreach ($purchaseTransactions as $purchaseTransaction) {
    echo $purchaseTransaction->reference . ': ' . $purchaseTransaction->price;
}
```

#### Get All Purchase Transactions

Get all purchase transactions at once.

```php
$allPurchaseTransactions = $client->purchaseTransactions()->all();

// Iterate through all purchase transactions
foreach ($allPurchaseTransactions as $purchaseTransaction) {
    echo $purchaseTransaction->reference . ': ' . $purchaseTransaction->price;
}
```

#### Create a Purchase Transaction

Create a new purchase transaction.

```php
$data = [
    'contact_id' => '123456789',
    'reference' => 'TRANS-2023-001',
    'date' => '2023-01-15',
    'due_date' => '2023-02-15',
    'price' => '250.00',
    'currency' => 'EUR',
    'payment_method' => 'bank_transfer',
    'details' => [
        [
            'description' => 'Office Equipment Purchase',
            'price' => '250.00',
            'ledger_account_id' => '123456'
        ]
    ]
];

$purchaseTransaction = $client->purchaseTransactions()->create($data);
```

#### Update a Purchase Transaction

Update an existing purchase transaction.

```php
$updateData = [
    'reference' => 'TRANS-2023-001-UPDATED',
    'due_date' => '2023-03-01'
];

$purchaseTransaction = $client->purchaseTransactions()->update('123456789', $updateData);
```

#### Delete a Purchase Transaction

Delete a purchase transaction.

```php
$client->purchaseTransactions()->delete('123456789');
```

## Purchase Transaction Properties

When working with purchase transactions, you'll have access to the following properties:

| Property | Type | Description |
|----------|------|-------------|
| id | string | Unique identifier |
| administration_id | string | ID of the administration the purchase transaction belongs to |
| contact_id | string | ID of the contact associated with the purchase transaction |
| reference | string | Reference number or code for the purchase transaction |
| date | string | Date of the purchase transaction |
| due_date | string | Due date for payment |
| price | string | Total price of the purchase transaction |
| currency | string | Currency code (e.g., 'EUR', 'USD') |
| payment_method | string | Method of payment (e.g., 'bank_transfer', 'cash') |
| state | string | Current state of the purchase transaction |
| details | array | Line items and details of the purchase transaction |
| created_at | string | ISO 8601 timestamp of when the purchase transaction was created |
| updated_at | string | ISO 8601 timestamp of when the purchase transaction was last updated |

> **Note:** See the [official API reference](https://developer.moneybird.com/api/purchase_transactions/) for the complete list of available properties.

## Further reading

- Read [the full API reference](https://developer.moneybird.com/api/purchase_transactions/) in the Moneybird developer docs
