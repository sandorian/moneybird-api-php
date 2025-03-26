---
title: External Sales Invoices
description: Interacting with Moneybird's External Sales Invoices API.
---

Manage your External Sales Invoices in Moneybird.

## Working with External Sales Invoices

This section covers how to interact with Moneybird's External Sales Invoices API. You can create, retrieve, update, and delete external sales invoices, as well as manage attachments and payments.

### Basic Operations

#### Get an External Sales Invoice

Retrieve an external sales invoice by its ID.

```php
$externalSalesInvoice = $client->externalSalesInvoices()->get('123456789');
```

#### List External Sales Invoices

Get a paginated list of external sales invoices.

```php
$externalSalesInvoices = $client->externalSalesInvoices()->paginate();

// Iterate through the pages
foreach ($externalSalesInvoices as $externalSalesInvoice) {
    echo $externalSalesInvoice->reference;
}
```

#### Create an External Sales Invoice

Create a new external sales invoice.

```php
$data = [
    'contact_id' => '987654321',
    'reference' => 'INV-2025-001',
    'date' => '2025-03-01',
    'due_date' => '2025-03-15',
    'currency' => 'EUR',
    'prices_are_incl_tax' => true,
    'details_attributes' => [
        [
            'description' => 'Product A',
            'price' => '100.00',
            'amount' => '2',
            'tax_rate_id' => '123456'
        ]
    ]
];

$externalSalesInvoice = $client->externalSalesInvoices()->create($data);
```

#### Update an External Sales Invoice

Update an existing external sales invoice.

```php
$updateData = [
    'reference' => 'INV-2025-001-UPDATED',
    'due_date' => '2025-03-20'
];

$externalSalesInvoice = $client->externalSalesInvoices()->update('123456789', $updateData);
```

#### Delete an External Sales Invoice

Delete an external sales invoice.

```php
$client->externalSalesInvoices()->delete('123456789');
```

### Specialized Features

#### Synchronize External Sales Invoices

Synchronize a list of external sales invoices by their IDs.

```php
$ids = ['123456789', '987654321'];
$externalSalesInvoices = $client->externalSalesInvoices()->synchronize($ids);
```

#### Working with Attachments

Access the attachments endpoint for an external sales invoice.

```php
// Get the attachments endpoint
$attachmentsEndpoint = $client->externalSalesInvoices()->attachments();

// Upload an attachment
$attachment = $attachmentsEndpoint->create('123456789', [
    'filename' => 'invoice.pdf',
    'content' => base64_encode(file_get_contents('path/to/invoice.pdf'))
]);

// Get an attachment
$attachment = $attachmentsEndpoint->get('123456789', 'attachment_id');

// Delete an attachment
$attachmentsEndpoint->delete('123456789', 'attachment_id');
```

#### Working with Payments

Access the payments endpoint for an external sales invoice.

```php
// Get the payments endpoint
$paymentsEndpoint = $client->externalSalesInvoices()->payments();

// Create a payment
$payment = $paymentsEndpoint->create('123456789', [
    'payment_date' => '2025-03-05',
    'price' => '200.00',
    'payment_method' => 'bank_transfer'
]);

// Delete a payment
$paymentsEndpoint->delete('123456789', 'payment_id');
```

## External Sales Invoice Properties

When working with external sales invoices, you'll have access to the following properties:

| Property | Type | Description |
|----------|------|-------------|
| id | string | Unique identifier |
| administration_id | string | ID of the administration the invoice belongs to |
| contact_id | string | ID of the contact associated with the invoice |
| contact | array | Contact details |
| date | string | Date of the invoice (YYYY-MM-DD) |
| state | string | Current state of the invoice |
| due_date | string | Due date of the invoice (YYYY-MM-DD) |
| reference | string | Your reference for this invoice |
| entry_number | integer | Entry number in the administration |
| currency | string | Currency used in the invoice |
| paid_at | string | Date when the invoice was paid |
| total_paid | string | Total amount paid |
| total_unpaid | string | Total amount unpaid |
| prices_are_incl_tax | boolean | Whether prices include tax |
| total_price_excl_tax | string | Total price excluding tax |
| total_price_incl_tax | string | Total price including tax |
| details | array | Line items on the invoice |
| payments | array | Payment information |
| notes | array | Notes attached to the invoice |
| attachments | array | Attachments linked to the invoice |
| created_at | string | ISO 8601 timestamp of when the invoice was created |
| updated_at | string | ISO 8601 timestamp of when the invoice was last updated |

> **Note:** See the [official API reference](https://developer.moneybird.com/api/external_sales_invoices/) for the complete list of available properties.

## Further reading

- Read [the full API reference](https://developer.moneybird.com/api/external_sales_invoices/) in the Moneybird developer docs
