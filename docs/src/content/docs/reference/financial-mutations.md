---
title: Financial Mutations
description: Interacting with Moneybird's Financial Mutations API.
---

Manage your Financial Mutations in Moneybird.

## Working with Financial Mutations

This section covers how to interact with Moneybird's Financial Mutations API. You can retrieve, update, and link bookings to financial mutations.

### Basic Operations

#### Get a Financial Mutation

Retrieve a financial mutation by its ID.

```php
$financialMutation = $client->financialMutations()->get('123456789');
```

#### List Financial Mutations

Get a paginated list of financial mutations.

```php
$financialMutations = $client->financialMutations()->paginate();

// Iterate through the pages
foreach ($financialMutations as $financialMutation) {
    echo $financialMutation->amount;
}
```

#### Get All Financial Mutations

Get all financial mutations at once.

```php
$allFinancialMutations = $client->financialMutations()->all();

// Iterate through all financial mutations
foreach ($allFinancialMutations as $financialMutation) {
    echo $financialMutation->amount;
}
```

#### Update a Financial Mutation

Update an existing financial mutation.

```php
$updateData = [
    'message' => 'Updated transaction description'
];

$financialMutation = $client->financialMutations()->update('123456789', $updateData);
```

### Specialized Features

#### Link a Booking to a Financial Mutation

Link a booking (such as an invoice or purchase) to a financial mutation.

```php
$linkData = [
    'booking_type' => 'SalesInvoice',
    'booking_id' => '987654321',
    'price' => '100.00'
];

$financialMutation = $client->financialMutations()->linkBooking('123456789', $linkData);
```

#### Synchronize Financial Mutations

Synchronize a list of financial mutations by their IDs.

```php
$ids = ['123456789', '987654321'];
$financialMutations = $client->financialMutations()->synchronize($ids);
```

## Financial Mutation Properties

When working with financial mutations, you'll have access to the following properties:

| Property | Type | Description |
|----------|------|-------------|
| id | string | Unique identifier |
| administration_id | string | ID of the administration the financial mutation belongs to |
| financial_account_id | string | ID of the financial account associated with this mutation |
| type | string | Type of the financial mutation |
| amount | string | Amount of the financial mutation |
| code | string | Code of the financial mutation |
| date | string | Date of the financial mutation (YYYY-MM-DD) |
| message | string | Description or message for the financial mutation |
| contra_account_name | string | Name of the contra account |
| contra_account_number | string | Number of the contra account |
| batch_reference | string | Reference for batch processing |
| ledger_account_bookings | array | Bookings linked to ledger accounts |
| payments | array | Payments associated with this mutation |
| created_at | string | ISO 8601 timestamp of when the financial mutation was created |
| updated_at | string | ISO 8601 timestamp of when the financial mutation was last updated |

> **Note:** See the [official API reference](https://developer.moneybird.com/api/financial_mutations/) for the complete list of available properties.

## Further reading

- Read [the full API reference](https://developer.moneybird.com/api/financial_mutations/) in the Moneybird developer docs
