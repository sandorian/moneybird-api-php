---
title: External Sales Invoice Payments
description: Interacting with Moneybird's External Sales Invoice Payments API.
---

Manage payments for external sales invoices in Moneybird.

## Working with External Sales Invoice Payments

This section covers how to interact with Moneybird's External Sales Invoice Payments API. These payments represent money received for external sales invoices.

### Basic Operations

#### Create a Payment for an External Sales Invoice

Register a payment for an external sales invoice.

```php
$externalSalesInvoiceId = '123456789';
$data = [
    'payment_date' => '2025-02-28',
    'price' => '100.00',
    'financial_account_id' => '987654321',
    'ledger_account_id' => '123123123',
    'transaction_identifier' => 'TRANSACTION123'
];

$payment = $client->externalSalesInvoicePayments()->createForExternalSalesInvoiceId(
    $externalSalesInvoiceId,
    $data
);

echo "Payment ID: " . $payment->id;
```

#### Delete a Payment for an External Sales Invoice

Remove a payment from an external sales invoice.

```php
$externalSalesInvoiceId = '123456789';
$paymentId = '987654321';

$client->externalSalesInvoicePayments()->deleteForExternalSalesInvoiceId(
    $externalSalesInvoiceId,
    $paymentId
);
```

## Payment Properties

When working with external sales invoice payments, you'll have access to the following properties:

| Property | Type | Description |
|----------|------|-------------|
| id | string | Unique identifier for the payment |
| administration_id | int | ID of the administration the payment belongs to |
| invoice_type | string | Type of invoice (always "ExternalSalesInvoice" for these payments) |
| invoice_id | string | ID of the external sales invoice the payment is for |
| financial_account_id | string | ID of the financial account the payment was made to |
| user_id | int | ID of the user who created the payment |
| payment_transaction_id | string | ID of the payment transaction |
| transaction_identifier | string | External identifier for the transaction |
| price | string | Amount of the payment |
| price_base | string | Base amount of the payment (before currency conversion) |
| payment_date | string | Date the payment was made (YYYY-MM-DD) |
| credit_invoice_id | string | ID of the credit invoice if this payment is related to a credit |
| financial_mutation_id | string | ID of the related financial mutation |
| ledger_account_id | string | ID of the ledger account the payment is booked to |
| linked_payment_id | string | ID of a linked payment |
| manual_payment_action | string | Description of any manual payment action |
| created_at | string | Timestamp when the payment was created |
| updated_at | string | Timestamp when the payment was last updated |

## Further reading

- See the [External Sales Invoices](/reference/external-sales-invoices/) documentation for more information on working with external sales invoices
