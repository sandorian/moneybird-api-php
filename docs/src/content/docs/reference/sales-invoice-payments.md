---
title: Sales Invoice Payments
description: Interacting with Moneybird's Sales Invoice Payments API.
---

Manage payments for Sales Invoices in Moneybird.

## Working with Sales Invoice Payments

This section covers how to interact with Moneybird's Sales Invoice Payments API. You can register payments for sales invoices.

### Basic Operations

#### Register a Payment

Register a payment for a specific sales invoice.

```php
$paymentData = [
    'payment_date' => '2023-01-20',
    'price' => '500.00',
    'payment_method' => 'bank_transfer'
];

$payment = $client->salesInvoices()->payments()->registerForSalesInvoiceId('123456789', $paymentData);
```

#### Delete a Payment

Delete a payment associated with a sales invoice.

```php
$client->salesInvoices()->deletePayment('123456789', 'payment_id');
```

> **Note:** The delete payment functionality is available through the SalesInvoicesEndpoint rather than the SalesInvoicePaymentsEndpoint.

### Accessing the Payments Endpoint

You can access the payments endpoint through the sales invoices endpoint:

```php
$paymentsEndpoint = $client->salesInvoices()->payments();
```

## Sales Invoice Payment Properties

When working with sales invoice payments, you'll have access to the following properties:

| Property | Type | Description |
|----------|------|-------------|
| id | string | Unique identifier |
| administration_id | string | ID of the administration the payment belongs to |
| invoice_id | string | ID of the sales invoice the payment is for |
| payment_date | string | Date when the payment was made |
| price | string | Amount of the payment |
| price_base | string | Amount of the payment in base currency |
| payment_method | string | Method of payment (e.g., 'bank_transfer', 'credit_card', 'cash') |
| created_at | string | ISO 8601 timestamp of when the payment was created |
| updated_at | string | ISO 8601 timestamp of when the payment was last updated |

> **Note:** See the [official API reference](https://developer.moneybird.com/api/sales_invoices/#post_sales_invoices_id_payments) for the complete list of available properties.

## Further reading

- Read [the full API reference](https://developer.moneybird.com/api/sales_invoices/#post_sales_invoices_id_payments) in the Moneybird developer docs
