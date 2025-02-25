<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Tests\Api\FinancialAccounts;

class FinancialAccountsResponseStub
{
    public static function getAll(): string
    {
        return '[
            {
                "id": "123456789",
                "administration_id": "123",
                "type": "bank",
                "name": "Bank Account",
                "identifier": "NL01BANK0123456789",
                "currency": "EUR",
                "provider": "bank",
                "active": true,
                "created_at": "2023-01-01T12:00:00.000Z",
                "updated_at": "2023-01-01T12:00:00.000Z"
            },
            {
                "id": "987654321",
                "administration_id": "123",
                "type": "creditcard",
                "name": "Credit Card",
                "identifier": "1234-5678-9012-3456",
                "currency": "EUR",
                "provider": "creditcard",
                "active": true,
                "created_at": "2023-01-01T12:00:00.000Z",
                "updated_at": "2023-01-01T12:00:00.000Z"
            }
        ]';
    }

    public static function get(): string
    {
        return '{
            "id": "123456789",
            "administration_id": "123",
            "type": "bank",
            "name": "Bank Account",
            "identifier": "NL01BANK0123456789",
            "currency": "EUR",
            "provider": "bank",
            "active": true,
            "created_at": "2023-01-01T12:00:00.000Z",
            "updated_at": "2023-01-01T12:00:00.000Z"
        }';
    }
}
