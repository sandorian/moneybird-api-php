<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\ExternalSalesInvoices\Payments;

use Sandorian\Moneybird\Api\Support\BaseDto;

class ExternalSalesInvoicePayment extends BaseDto
{
    public string $id;

    public int $administration_id;

    public string $invoice_type;

    public string $invoice_id;

    public ?string $financial_account_id;

    public int $user_id;

    public ?string $payment_transaction_id;

    public ?string $transaction_identifier;

    public string $price;

    public string $price_base;

    public string $payment_date;

    public ?string $credit_invoice_id;

    public ?string $financial_mutation_id;

    public string $ledger_account_id;

    public ?string $linked_payment_id;

    public ?string $manual_payment_action;

    public string $created_at;

    public string $updated_at;
}
