<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Tests\Api\Payments;

class PaymentsResponseStub
{
    public static function getAll(): string
    {
        return '[
            {
                "id": "123456789",
                "administration_id": "123",
                "invoice_id": "456789123",
                "invoice_type": "SalesInvoice",
                "financial_account_id": "789123456",
                "financial_mutation_id": "321654987",
                "transaction_identifier": "TX001",
                "price": "100.00",
                "price_base": "100.00",
                "payment_date": "2023-01-01",
                "currency": "EUR",
                "payment_method": "bank_transfer",
                "created_at": "2023-01-01T12:00:00.000Z",
                "updated_at": "2023-01-01T12:00:00.000Z"
            },
            {
                "id": "987654321",
                "administration_id": "123",
                "invoice_id": "654321987",
                "invoice_type": "SalesInvoice",
                "financial_account_id": "789123456",
                "financial_mutation_id": "987654321",
                "transaction_identifier": "TX002",
                "price": "200.00",
                "price_base": "200.00",
                "payment_date": "2023-01-02",
                "currency": "EUR",
                "payment_method": "bank_transfer",
                "created_at": "2023-01-02T12:00:00.000Z",
                "updated_at": "2023-01-02T12:00:00.000Z"
            }
        ]';
    }

    public static function get(): string
    {
        return '{
            "id": "123456789",
            "administration_id": "123",
            "invoice_id": "456789123",
            "invoice_type": "SalesInvoice",
            "financial_account_id": "789123456",
            "financial_mutation_id": "321654987",
            "transaction_identifier": "TX001",
            "price": "100.00",
            "price_base": "100.00",
            "payment_date": "2023-01-01",
            "currency": "EUR",
            "payment_method": "bank_transfer",
            "created_at": "2023-01-01T12:00:00.000Z",
            "updated_at": "2023-01-01T12:00:00.000Z"
        }';
    }
}
