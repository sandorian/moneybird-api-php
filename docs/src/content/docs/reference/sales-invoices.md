---
title: Sales Invoices
description: Interacting with Moneybird's Sales Invoices API.
---

Manage your Sales Invoices in Moneybird.

## Working with Sales Invoices

This section covers how to interact with Moneybird's Sales Invoices API. You can create, retrieve, update, and delete sales invoices, as well as perform various actions such as sending, marking as paid, and duplicating.

### Basic Operations

#### Get a Sales Invoice

Retrieve a sales invoice by its ID.

```php
$salesInvoice = $client->salesInvoices()->get('123456789');
```

#### Find a Sales Invoice by Invoice ID

Find a sales invoice using its invoice ID.

```php
$salesInvoice = $client->salesInvoices()->findByInvoiceId('INV-2023-001');
```

#### Find a Sales Invoice by Reference

Find a sales invoice using its reference.

```php
$salesInvoice = $client->salesInvoices()->findByReference('Project A');
```

#### List Sales Invoices

Get a paginated list of sales invoices.

```php
$salesInvoices = $client->salesInvoices()->paginate();

// Iterate through the pages
foreach ($salesInvoices as $salesInvoice) {
    echo $salesInvoice->reference . ': ' . $salesInvoice->total_price_incl_tax;
}
```

#### Create a Sales Invoice

Create a new sales invoice.

```php
$data = [
    'contact_id' => '123456789',
    'reference' => 'INV-2023-001',
    'invoice_date' => '2023-01-15',
    'due_date' => '2023-02-15',
    'currency' => 'EUR',
    'discount' => '0',
    'prices_are_incl_tax' => true,
    'details' => [
        [
            'description' => 'Web Development Services',
            'price' => '100.00',
            'amount' => '10',
            'tax_rate_id' => '123456'
        ]
    ]
];

$salesInvoice = $client->salesInvoices()->create($data);
```

#### Update a Sales Invoice

Update an existing sales invoice.

```php
$updateData = [
    'reference' => 'INV-2023-001-UPDATED',
    'due_date' => '2023-03-01'
];

$salesInvoice = $client->salesInvoices()->update('123456789', $updateData);
```

#### Delete a Sales Invoice

Delete a sales invoice.

```php
$client->salesInvoices()->delete('123456789');
```

### Invoice Actions

#### Send Email

Send the sales invoice by email.

```php
$salesInvoice = $client->salesInvoices()->sendEmail('123456789');
```

#### Get Email Template

Get the email template for a sales invoice.

```php
$emailTemplate = $client->salesInvoices()->getEmailTemplate('123456789');
```

#### Send Reminder

Send a reminder for the sales invoice.

```php
$salesInvoice = $client->salesInvoices()->sendReminder('123456789');
```

#### Get Reminder Template

Get the reminder template for a sales invoice.

```php
$reminderTemplate = $client->salesInvoices()->getReminderTemplate('123456789');
```

#### Send Invoice Reminder

Send an invoice reminder.

```php
$salesInvoice = $client->salesInvoices()->sendInvoiceReminder('123456789');
```

#### Send Payment Reminder

Send a payment reminder.

```php
$salesInvoice = $client->salesInvoices()->sendPaymentReminder('123456789');
```

#### Send by Post

Send the sales invoice by post.

```php
$salesInvoice = $client->salesInvoices()->sendPost('123456789');
```

### Status Management

#### Mark as Sent

Mark a sales invoice as sent.

```php
$salesInvoice = $client->salesInvoices()->markAsSent('123456789');
```

#### Mark as Accepted

Mark a sales invoice as accepted.

```php
$salesInvoice = $client->salesInvoices()->markAsAccepted('123456789');
```

#### Mark as Paid

Mark a sales invoice as paid.

```php
$salesInvoice = $client->salesInvoices()->markAsPaid('123456789');
```

#### Mark as Uncollectible

Mark a sales invoice as uncollectible.

```php
$salesInvoice = $client->salesInvoices()->markAsUncollectible('123456789');
```

#### Mark as Published

Mark a sales invoice as published.

```php
$salesInvoice = $client->salesInvoices()->markAsPublished('123456789');
```

#### Mark as Unpublished

Mark a sales invoice as unpublished.

```php
$salesInvoice = $client->salesInvoices()->markAsUnpublished('123456789');
```

### Invoice Duplication

#### Duplicate Invoice

Create a duplicate of a sales invoice.

```php
$duplicateInvoice = $client->salesInvoices()->duplicate('123456789');
```

#### Duplicate to Credit Invoice

Create a credit invoice from a sales invoice.

```php
$creditInvoice = $client->salesInvoices()->duplicateToCreditInvoice('123456789');
```

### Payments

#### Delete a Payment

Delete a payment associated with a sales invoice.

```php
$client->salesInvoices()->deletePayment('123456789', 'payment_id');
```

#### Access Payments Endpoint

Access the dedicated payments endpoint for a sales invoice.

```php
$paymentsEndpoint = $client->salesInvoices()->payments();
```

### Synchronization

#### Get Synchronization List

Get a list of sales invoice IDs and version timestamps for synchronization.

```php
$syncList = $client->salesInvoices()->synchronization();

foreach ($syncList as $item) {
    echo $item->id . ' (version: ' . $item->version . ')';
}
```

#### Synchronize Sales Invoices

Synchronize sales invoices by providing an array of IDs.

```php
$salesInvoiceIds = ['123456789', '987654321'];
$syncedSalesInvoices = $client->salesInvoices()->synchronize($salesInvoiceIds);

foreach ($syncedSalesInvoices as $salesInvoice) {
    echo $salesInvoice->reference;
}
```

## Sales Invoice Properties

When working with sales invoices, you'll have access to the following properties:

| Property | Type | Description |
|----------|------|-------------|
| id | string | Unique identifier |
| administration_id | string | ID of the administration the sales invoice belongs to |
| contact_id | string | ID of the contact associated with the sales invoice |
| contact | array | Contact information |
| contact_person_id | string | ID of the contact person |
| contact_person | array | Contact person information |
| invoice_id | string | Invoice ID (formatted ID shown to customers) |
| recurring_sales_invoice_id | string | ID of the recurring sales invoice if this was generated from one |
| subscription_id | string | ID of the subscription if applicable |
| workflow_id | string | ID of the workflow to use for the sales invoice |
| document_style_id | string | ID of the document style |
| identity_id | string | ID of the identity |
| draft_id | int | ID of the draft |
| state | string | Current state of the sales invoice |
| invoice_date | string | Date of the invoice |
| due_date | string | Due date for payment |
| payment_conditions | string | Payment conditions text |
| payment_reference | string | Payment reference |
| short_payment_reference | string | Short payment reference |
| reference | string | Reference text for the sales invoice |
| language | string | Language code for the invoice |
| currency | string | Currency code |
| discount | string | Discount percentage |
| original_sales_invoice_id | string | ID of the original sales invoice if this is a duplicate |
| paused | boolean | Whether the invoice is paused |
| paid_at | string  | Date when the invoice was paid |
| sent_at | string  | Date when the invoice was sent |
| created_at | string  | ISO 8601 timestamp of when the sales invoice was created |
| updated_at | string  | ISO 8601 timestamp of when the sales invoice was last updated |
| public_view_code | string  | Code for public view access |
| public_view_code_expires_at | string  | Expiration date for public view code |
| version | int     | Version number |
| details | array   | Line items on the sales invoice |
| payments | array   | Payment information |
| total_paid | string  | Total amount paid |
| total_unpaid | string  | Total amount unpaid |
| total_unpaid_base | string  | Total amount unpaid in base currency |
| prices_are_incl_tax | boolean | Whether prices include tax |
| total_price_excl_tax | string  | Total price excluding tax |
| total_price_excl_tax_base | string  | Total price excluding tax in base currency |
| total_price_incl_tax | string  | Total price including tax |
| total_price_incl_tax_base | string  | Total price including tax in base currency |
| total_discount | string  | Total discount amount |
| marked_dubious_on | string  | Date when marked as dubious |
| marked_uncollectible_on | string  | Date when marked as uncollectible |
| reminder_count | int     | Number of reminders sent |
| next_reminder | string  | Date of the next reminder |
| original_estimate_id | string  | ID of the original estimate if created from one |
| url | string  | URL to view the invoice |
| payment_url | string  | URL for payment |
| custom_fields | array   | Custom fields for the sales invoice |
| notes | array   | Notes associated with the sales invoice |
| attachments | array   | Attachments associated with the sales invoice |
| events | array   | Events related to the sales invoice |
| tax_totals | array   | Tax totals information |

> **Note:** See the [official API reference](https://developer.moneybird.com/api/sales_invoices/) for the complete list of available properties.

## Further reading

- Read [the full API reference](https://developer.moneybird.com/api/sales_invoices/) in the Moneybird developer docs
