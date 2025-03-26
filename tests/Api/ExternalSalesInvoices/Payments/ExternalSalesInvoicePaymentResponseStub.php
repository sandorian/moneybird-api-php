<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Tests\Api\ExternalSalesInvoices\Payments;

class ExternalSalesInvoicePaymentResponseStub
{
    public static function get(): array
    {
        return [
            'id' => '426664167809746572',
            'administration_id' => '123',
            'invoice_type' => 'ExternalSalesInvoice',
            'invoice_id' => '426664167757317770',
            'financial_account_id' => null,
            'user_id' => 17211185545521,
            'payment_transaction_id' => null,
            'transaction_identifier' => null,
            'price' => '121.0',
            'price_base' => '121.0',
            'payment_date' => '2024-07-16',
            'credit_invoice_id' => null,
            'financial_mutation_id' => null,
            'ledger_account_id' => '426664036194584102',
            'linked_payment_id' => null,
            'manual_payment_action' => null,
            'created_at' => '2024-07-16T08:31:20.291Z',
            'updated_at' => '2024-07-16T08:31:20.291Z',
        ];
    }
}
