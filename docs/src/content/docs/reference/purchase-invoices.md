---
title: Purchase Invoices
description: Interacting with Moneybird's Purchase Invoices API.
---

Manage your Purchase Invoices in Moneybird.

## Working with Purchase Invoices

This section covers how to interact with Moneybird's Purchase Invoices API. You can create, retrieve, update, and delete purchase invoices, as well as manage attachments and synchronize data.

### Basic Operations

#### Get a Purchase Invoice

Retrieve a purchase invoice by its ID.

```php
$purchaseInvoice = $client->purchaseInvoices()->get('123456789');
```

#### List Purchase Invoices

Get a paginated list of purchase invoices.

```php
$purchaseInvoices = $client->purchaseInvoices()->paginate();

// Iterate through the pages
foreach ($purchaseInvoices as $purchaseInvoice) {
    echo $purchaseInvoice->reference . ': ' . $purchaseInvoice->total_price_incl_tax;
}
```

#### Get All Purchase Invoices

Get all purchase invoices at once.

```php
$allPurchaseInvoices = $client->purchaseInvoices()->all();

// Iterate through all purchase invoices
foreach ($allPurchaseInvoices as $purchaseInvoice) {
    echo $purchaseInvoice->reference . ': ' . $purchaseInvoice->total_price_incl_tax;
}
```

#### Create a Purchase Invoice

Create a new purchase invoice.

```php
$data = [
    'contact_id' => '123456789',
    'reference' => 'INV-2023-001',
    'date' => '2023-01-15',
    'due_date' => '2023-02-15',
    'currency' => 'EUR',
    'prices_are_incl_tax' => true,
    'details' => [
        [
            'description' => 'Office Supplies',
            'price' => '100.00',
            'amount' => '1',
            'tax_rate_id' => '123456'
        ]
    ]
];

$purchaseInvoice = $client->purchaseInvoices()->create($data);
```

#### Update a Purchase Invoice

Update an existing purchase invoice.

```php
$updateData = [
    'reference' => 'INV-2023-001-UPDATED',
    'due_date' => '2023-03-01'
];

$purchaseInvoice = $client->purchaseInvoices()->update('123456789', $updateData);
```

#### Delete a Purchase Invoice

Delete a purchase invoice.

```php
$client->purchaseInvoices()->delete('123456789');
```

### Attachments

#### Add an Attachment

Add an attachment to a purchase invoice.

```php
$attachmentData = [
    'filename' => 'invoice.pdf',
    'content' => base64_encode(file_get_contents('/path/to/invoice.pdf'))
];

$client->purchaseInvoices()->createAttachment('123456789', $attachmentData);
```

#### Delete an Attachment

Delete an attachment from a purchase invoice.

```php
$client->purchaseInvoices()->deleteAttachment('123456789', 'attachment_id');
```

### Synchronization

#### Get Synchronization List

Get a list of purchase invoice IDs and version timestamps for synchronization.

```php
$syncList = $client->purchaseInvoices()->synchronization();

foreach ($syncList as $item) {
    echo $item->id . ' (version: ' . $item->version . ')';
}
```

#### Synchronize Purchase Invoices

Synchronize purchase invoices by providing an array of IDs.

```php
$purchaseInvoiceIds = ['123456789', '987654321'];
$syncedPurchaseInvoices = $client->purchaseInvoices()->synchronize($purchaseInvoiceIds);

foreach ($syncedPurchaseInvoices as $purchaseInvoice) {
    echo $purchaseInvoice->reference;
}
```

## Purchase Invoice Properties

When working with purchase invoices, you'll have access to the following properties:

| Property | Type | Description |
|----------|------|-------------|
| id | string | Unique identifier |
| administration_id | string | ID of the administration the purchase invoice belongs to |
| contact_id | string | ID of the contact associated with the purchase invoice |
| reference | string | Reference number or code for the purchase invoice |
| date | string | Date of the purchase invoice |
| due_date | string | Due date for payment |
| entry_number | string | Entry number in the system |
| state | string | Current state of the purchase invoice |
| currency | string | Currency code (e.g., 'EUR', 'USD') |
| exchange_rate | string | Exchange rate if not using the default currency |
| revenue_invoice | string | Whether this is a revenue invoice |
| prices_are_incl_tax | string | Whether prices include tax |
| origin | string | Origin of the purchase invoice |
| paid_at | string | Date when the invoice was paid |
| tax_number | string | Tax number associated with the invoice |
| total_price_excl_tax | string | Total price excluding tax |
| total_price_incl_tax | string | Total price including tax |
| details | array | Line items on the purchase invoice |
| payments | array | Payment information |
| notes | array | Notes associated with the purchase invoice |
| attachments | array | Attachments associated with the purchase invoice |
| events | array | Events related to the purchase invoice |
| created_at | string | ISO 8601 timestamp of when the purchase invoice was created |
| updated_at | string | ISO 8601 timestamp of when the purchase invoice was last updated |

> **Note:** See the [official API reference](https://developer.moneybird.com/api/purchase_invoices/) for the complete list of available properties.

## Further reading

- Read [the full API reference](https://developer.moneybird.com/api/purchase_invoices/) in the Moneybird developer docs
