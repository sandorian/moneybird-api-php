<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Tests\Api\FinancialMutations;

class FinancialMutationsResponseStub
{
    public static function getAll(): string
    {
        return '[
            {
                "id": "123456789",
                "administration_id": "123",
                "financial_account_id": "456789123",
                "type": "debit",
                "amount": "100.00",
                "code": "TRTP",
                "date": "2023-01-01",
                "message": "Payment for invoice",
                "contra_account_name": "Client Company",
                "contra_account_number": "NL01BANK9876543210",
                "batch_reference": "BATCH123",
                "offset_id": null,
                "sepa_fields": null,
                "created_at": "2023-01-01T12:00:00.000Z",
                "updated_at": "2023-01-01T12:00:00.000Z",
                "ledger_account_bookings": [],
                "payments": []
            },
            {
                "id": "987654321",
                "administration_id": "123",
                "financial_account_id": "456789123",
                "type": "credit",
                "amount": "50.00",
                "code": "TRTP",
                "date": "2023-01-02",
                "message": "Payment for services",
                "contra_account_name": "Vendor Company",
                "contra_account_number": "NL01BANK5432109876",
                "batch_reference": "BATCH456",
                "offset_id": null,
                "sepa_fields": null,
                "created_at": "2023-01-02T12:00:00.000Z",
                "updated_at": "2023-01-02T12:00:00.000Z",
                "ledger_account_bookings": [],
                "payments": []
            }
        ]';
    }

    public static function synchronization(): string
    {
        return '[
            {
                "id": "123456789",
                "version": 1234567890
            },
            {
                "id": "987654321",
                "version": 987654321
            }
        ]';
    }

    public static function get(): string
    {
        return '{
            "id": "123456789",
            "administration_id": "123",
            "financial_account_id": "456789123",
            "type": "debit",
            "amount": "100.00",
            "code": "TRTP",
            "date": "2023-01-01",
            "message": "Payment for invoice",
            "contra_account_name": "Client Company",
            "contra_account_number": "NL01BANK9876543210",
            "batch_reference": "BATCH123",
            "offset_id": null,
            "sepa_fields": null,
            "created_at": "2023-01-01T12:00:00.000Z",
            "updated_at": "2023-01-01T12:00:00.000Z",
            "ledger_account_bookings": [],
            "payments": []
        }';
    }

    public static function update(): string
    {
        return '{
            "id": "123456789",
            "administration_id": "123",
            "financial_account_id": "456789123",
            "type": "debit",
            "amount": "100.00",
            "code": "TRTP",
            "date": "2023-01-01",
            "message": "Updated payment message",
            "contra_account_name": "Client Company",
            "contra_account_number": "NL01BANK9876543210",
            "batch_reference": "BATCH123",
            "offset_id": null,
            "sepa_fields": null,
            "created_at": "2023-01-01T12:00:00.000Z",
            "updated_at": "2023-01-03T12:00:00.000Z",
            "ledger_account_bookings": [],
            "payments": []
        }';
    }

    public static function linkBooking(): string
    {
        return '{
            "id": "123456789",
            "administration_id": "123",
            "financial_account_id": "456789123",
            "type": "debit",
            "amount": "100.00",
            "code": "TRTP",
            "date": "2023-01-01",
            "message": "Payment for invoice",
            "contra_account_name": "Client Company",
            "contra_account_number": "NL01BANK9876543210",
            "batch_reference": "BATCH123",
            "offset_id": null,
            "sepa_fields": null,
            "created_at": "2023-01-01T12:00:00.000Z",
            "updated_at": "2023-01-03T12:00:00.000Z",
            "ledger_account_bookings": [
                {
                    "id": "123456",
                    "administration_id": "123",
                    "ledger_account_id": "789456",
                    "description": "Booking for invoice payment",
                    "price": "100.00",
                    "created_at": "2023-01-03T12:00:00.000Z",
                    "updated_at": "2023-01-03T12:00:00.000Z"
                }
            ],
            "payments": []
        }';
    }
}
