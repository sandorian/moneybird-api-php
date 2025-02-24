<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Tests\Api\SalesInvoices\Payments;

class SalesInvoicePaymentResponseStub
{
    public static function get(): array
    {
        return [
            'id' => '446241800938587779',
            'administration_id' => '123456789',
            'invoice_id' => '446241800938587778',
            'payment_date' => '2025-02-24',
            'price' => '129.95',
            'price_base' => '129.95',
            'payment_method' => 'credit_card',
            'created_at' => '2025-02-24T21:56:09Z',
            'updated_at' => '2025-02-24T21:56:09Z',
        ];
    }
}
