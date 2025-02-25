<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Tests\Api\RecurringSalesInvoices;

class RecurringSalesInvoicesResponseStub
{
    public static function getAll(): string
    {
        return '[
            {
                "id": "123456789012345678",
                "administration_id": "123456789012345678",
                "contact_id": "123456789012345678",
                "workflow_id": "123456789012345678",
                "state": "active",
                "start_date": "2023-01-01",
                "invoice_period": "month",
                "invoice_interval": "1",
                "frequency_type": "month",
                "frequency": "1",
                "reference": "REF-001",
                "language": "nl",
                "currency": "EUR",
                "discount": "0",
                "first_due_interval": "14",
                "auto_send": true,
                "sending_scheduled_at": "2023-01-01T12:00:00.000Z",
                "sending_method": "email",
                "created_at": "2023-01-01T12:00:00.000Z",
                "updated_at": "2023-01-01T12:00:00.000Z",
                "details": [
                    {
                        "id": "123456789012345678",
                        "description": "Test Product",
                        "price": "100.00",
                        "amount": "1",
                        "tax_rate_id": "123456789012345678",
                        "ledger_account_id": "123456789012345678"
                    }
                ]
            }
        ]';
    }

    public static function get(): string
    {
        return '{
            "id": "123456789012345678",
            "administration_id": "123456789012345678",
            "contact_id": "123456789012345678",
            "workflow_id": "123456789012345678",
            "state": "active",
            "start_date": "2023-01-01",
            "invoice_period": "month",
            "invoice_interval": "1",
            "frequency_type": "month",
            "frequency": "1",
            "reference": "REF-001",
            "language": "nl",
            "currency": "EUR",
            "discount": "0",
            "first_due_interval": "14",
            "auto_send": true,
            "sending_scheduled_at": "2023-01-01T12:00:00.000Z",
            "sending_method": "email",
            "created_at": "2023-01-01T12:00:00.000Z",
            "updated_at": "2023-01-01T12:00:00.000Z",
            "details": [
                {
                    "id": "123456789012345678",
                    "description": "Test Product",
                    "price": "100.00",
                    "amount": "1",
                    "tax_rate_id": "123456789012345678",
                    "ledger_account_id": "123456789012345678"
                }
            ]
        }';
    }

    public static function create(): string
    {
        return self::get();
    }

    public static function update(): string
    {
        return self::get();
    }

    public static function delete(): string
    {
        return '';
    }

    public static function getSynchronization(): string
    {
        return '[
            {
                "id": "123456789012345678",
                "version": 1
            }
        ]';
    }

    public static function postSynchronization(): string
    {
        return self::getAll();
    }
}
