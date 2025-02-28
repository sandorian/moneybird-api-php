---
title: Receipts
description: Interacting with Moneybird's Receipts API.
---

Manage your Receipts in Moneybird.

## Working with Receipts

This section covers how to interact with Moneybird's Receipts API. You can create, retrieve, update, and delete receipts, as well as manage attachments and synchronize data.

### Basic Operations

#### Get a Receipt

Retrieve a receipt by its ID.

```php
$receipt = $client->receipts()->get('123456789');
```

#### List Receipts

Get a paginated list of receipts.

```php
$receipts = $client->receipts()->paginate();

// Iterate through the pages
foreach ($receipts as $receipt) {
    echo $receipt->reference . ': ' . $receipt->total_price_incl_tax;
}
```

#### Get All Receipts

Get all receipts at once.

```php
$allReceipts = $client->receipts()->all();

// Iterate through all receipts
foreach ($allReceipts as $receipt) {
    echo $receipt->reference . ': ' . $receipt->total_price_incl_tax;
}
```

#### Create a Receipt

Create a new receipt.

```php
$data = [
    'contact_id' => '123456789',
    'reference' => 'RCPT-2023-001',
    'date' => '2023-01-15',
    'currency' => 'EUR',
    'prices_are_incl_tax' => true,
    'details' => [
        [
            'description' => 'Office Supplies',
            'price' => '50.00',
            'amount' => '1',
            'tax_rate_id' => '123456'
        ]
    ]
];

$receipt = $client->receipts()->create($data);
```

#### Update a Receipt

Update an existing receipt.

```php
$updateData = [
    'reference' => 'RCPT-2023-001-UPDATED',
    'date' => '2023-01-20'
];

$receipt = $client->receipts()->update('123456789', $updateData);
```

#### Delete a Receipt

Delete a receipt.

```php
$client->receipts()->delete('123456789');
```

### Attachments

#### Add an Attachment

Add an attachment to a receipt.

```php
$attachmentData = [
    'filename' => 'receipt.pdf',
    'content' => base64_encode(file_get_contents('/path/to/receipt.pdf'))
];

$client->receipts()->createAttachment('123456789', $attachmentData);
```

#### Delete an Attachment

Delete an attachment from a receipt.

```php
$client->receipts()->deleteAttachment('123456789', 'attachment_id');
```

### Synchronization

#### Get Synchronization List

Get a list of receipt IDs and version timestamps for synchronization.

```php
$syncList = $client->receipts()->synchronization();

foreach ($syncList as $item) {
    echo $item->id . ' (version: ' . $item->version . ')';
}
```

#### Synchronize Receipts

Synchronize receipts by providing an array of IDs.

```php
$receiptIds = ['123456789', '987654321'];
$syncedReceipts = $client->receipts()->synchronize($receiptIds);

foreach ($syncedReceipts as $receipt) {
    echo $receipt->reference;
}
```

## Receipt Properties

When working with receipts, you'll have access to the following properties:

| Property | Type | Description |
|----------|------|-------------|
| id | string | Unique identifier |
| administration_id | string | ID of the administration the receipt belongs to |
| contact_id | string | ID of the contact associated with the receipt |
| reference | string | Reference number or code for the receipt |
| date | string | Date of the receipt |
| due_date | string | Due date for payment |
| entry_number | string | Entry number in the system |
| state | string | Current state of the receipt |
| currency | string | Currency code (e.g., 'EUR', 'USD') |
| exchange_rate | string | Exchange rate if not using the default currency |
| prices_are_incl_tax | string | Whether prices include tax |
| origin | string | Origin of the receipt |
| paid_at | string | Date when the receipt was paid |
| total_price_excl_tax | string | Total price excluding tax |
| total_price_incl_tax | string | Total price including tax |
| details | array | Line items on the receipt |
| payments | array | Payment information |
| notes | array | Notes associated with the receipt |
| attachments | array | Attachments associated with the receipt |
| events | array | Events related to the receipt |
| created_at | string | ISO 8601 timestamp of when the receipt was created |
| updated_at | string | ISO 8601 timestamp of when the receipt was last updated |

> **Note:** See the [official API reference](https://developer.moneybird.com/api/receipts/) for the complete list of available properties.

## Further reading

- Read [the full API reference](https://developer.moneybird.com/api/receipts/) in the Moneybird developer docs
