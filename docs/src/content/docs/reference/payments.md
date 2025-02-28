---
title: Payments
description: Interacting with Moneybird's Payments API.
---

Retrieve payment information from Moneybird.

## Working with Payments

This section covers how to interact with Moneybird's Payments API. You can retrieve payment information for invoices and other financial documents.

### Basic Operations

#### Get a Payment

Retrieve a payment by its ID.

```php
$payment = $client->payments()->get('123456789');
```

#### List Payments

Get a paginated list of payments.

```php
$payments = $client->payments()->paginate();

// Iterate through the pages
foreach ($payments as $payment) {
    echo $payment->payment_date . ': ' . $payment->price;
}
```

#### Get All Payments

Get all payments at once.

```php
$allPayments = $client->payments()->all();

// Iterate through all payments
foreach ($allPayments as $payment) {
    echo $payment->payment_date . ': ' . $payment->price;
}
```

## Payment Properties

When working with payments, you'll have access to the following properties:

| Property | Type | Description |
|----------|------|-------------|
| id | string | Unique identifier |
| administration_id | string | ID of the administration the payment belongs to |
| invoice_id | string | ID of the invoice this payment is for |
| invoice_type | string | Type of invoice (e.g., 'SalesInvoice', 'PurchaseInvoice') |
| financial_account_id | string | ID of the financial account the payment was made from/to |
| financial_mutation_id | string | ID of the related financial mutation |
| transaction_identifier | string | Identifier for the transaction |
| price | string | Amount of the payment |
| price_base | string | Base price amount |
| payment_date | string | Date the payment was made |
| currency | string | Currency of the payment |
| payment_method | string | Method used for payment |
| created_at | string | ISO 8601 timestamp of when the payment was created |
| updated_at | string | ISO 8601 timestamp of when the payment was last updated |

> **Note:** See the [official API reference](https://developer.moneybird.com/api/payments/) for the complete list of available properties.

## Further reading

- Read [the full API reference](https://developer.moneybird.com/api/payments/) in the Moneybird developer docs
