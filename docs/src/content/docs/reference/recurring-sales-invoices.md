---
title: Recurring Sales Invoices
description: Interacting with Moneybird's Recurring Sales Invoices API.
---

Manage your Recurring Sales Invoices in Moneybird.

## Working with Recurring Sales Invoices

This section covers how to interact with Moneybird's Recurring Sales Invoices API. You can create, retrieve, update, and delete recurring sales invoices, as well as synchronize data.

### Basic Operations

#### Get a Recurring Sales Invoice

Retrieve a recurring sales invoice by its ID.

```php
$recurringSalesInvoice = $client->recurringSalesInvoices()->get('123456789');
```

#### List Recurring Sales Invoices

Get a paginated list of recurring sales invoices.

```php
$recurringSalesInvoices = $client->recurringSalesInvoices()->paginate();

// Iterate through the pages
foreach ($recurringSalesInvoices as $recurringSalesInvoice) {
    echo $recurringSalesInvoice->reference . ': ' . $recurringSalesInvoice->frequency_type;
}
```

#### Get All Recurring Sales Invoices

Get all recurring sales invoices at once.

```php
$allRecurringSalesInvoices = $client->recurringSalesInvoices()->all();

// Iterate through all recurring sales invoices
foreach ($allRecurringSalesInvoices as $recurringSalesInvoice) {
    echo $recurringSalesInvoice->reference . ': ' . $recurringSalesInvoice->frequency_type;
}
```

#### Create a Recurring Sales Invoice

Create a new recurring sales invoice.

```php
$data = [
    'contact_id' => '123456789',
    'reference' => 'Monthly Service',
    'start_date' => '2023-01-01',
    'invoice_period' => 'month',
    'invoice_interval' => '1',
    'frequency_type' => 'month',
    'frequency' => '1',
    'workflow_id' => '123456',
    'language' => 'en',
    'currency' => 'EUR',
    'discount' => '0',
    'first_due_interval' => '14',
    'auto_send' => true,
    'sending_method' => 'email',
    'details' => [
        [
            'description' => 'Monthly Service Fee',
            'price' => '100.00',
            'amount' => '1',
            'tax_rate_id' => '123456'
        ]
    ]
];

$recurringSalesInvoice = $client->recurringSalesInvoices()->create($data);
```

#### Update a Recurring Sales Invoice

Update an existing recurring sales invoice.

```php
$updateData = [
    'reference' => 'Monthly Service - Updated',
    'frequency' => '2',
    'auto_send' => false
];

$recurringSalesInvoice = $client->recurringSalesInvoices()->update('123456789', $updateData);
```

#### Delete a Recurring Sales Invoice

Delete a recurring sales invoice.

```php
$client->recurringSalesInvoices()->delete('123456789');
```

### Synchronization

#### Get Synchronization List

Get a list of recurring sales invoice IDs and version timestamps for synchronization.

```php
$syncList = $client->recurringSalesInvoices()->synchronization();

foreach ($syncList as $item) {
    echo $item->id . ' (version: ' . $item->version . ')';
}
```

#### Synchronize Recurring Sales Invoices

Synchronize recurring sales invoices by providing an array of IDs.

```php
$recurringSalesInvoiceIds = ['123456789', '987654321'];
$syncedRecurringSalesInvoices = $client->recurringSalesInvoices()->synchronize($recurringSalesInvoiceIds);

foreach ($syncedRecurringSalesInvoices as $recurringSalesInvoice) {
    echo $recurringSalesInvoice->reference;
}
```

## Recurring Sales Invoice Properties

When working with recurring sales invoices, you'll have access to the following properties:

| Property | Type | Description |
|----------|------|-------------|
| id | string | Unique identifier |
| administration_id | string | ID of the administration the recurring sales invoice belongs to |
| contact_id | string | ID of the contact associated with the recurring sales invoice |
| contact | string | Contact information |
| workflow_id | string | ID of the workflow to use for the recurring sales invoice |
| state | string | Current state of the recurring sales invoice |
| start_date | string | Date when the recurring sales invoice starts |
| invoice_period | string | Period for which the invoice is valid (e.g., 'month', 'year') |
| invoice_interval | string | Interval between invoices |
| frequency_type | string | Type of frequency (e.g., 'month', 'week', 'year') |
| frequency | string | How often the invoice recurs |
| reference | string | Reference text for the recurring sales invoice |
| language | string | Language code for the invoice (e.g., 'en', 'nl') |
| currency | string | Currency code (e.g., 'EUR', 'USD') |
| discount | string | Discount percentage |
| first_due_interval | string | Number of days until the first invoice is due |
| auto_send | boolean | Whether to automatically send the invoice |
| sending_scheduled_at | string | When the sending is scheduled |
| sending_method | string | Method for sending the invoice (e.g., 'email', 'post') |
| details | array | Line items on the recurring sales invoice |
| notes | array | Notes associated with the recurring sales invoice |
| attachments | array | Attachments associated with the recurring sales invoice |
| custom_fields | array | Custom fields for the recurring sales invoice |
| created_at | string | ISO 8601 timestamp of when the recurring sales invoice was created |
| updated_at | string | ISO 8601 timestamp of when the recurring sales invoice was last updated |

> **Note:** See the [official API reference](https://developer.moneybird.com/api/recurring_sales_invoices/) for the complete list of available properties.

## Further reading

- Read [the full API reference](https://developer.moneybird.com/api/recurring_sales_invoices/) in the Moneybird developer docs
