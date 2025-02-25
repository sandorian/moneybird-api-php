<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Tests\Api\FinancialStatements;

class FinancialStatementsResponseStub
{
    public static function getAll(): string
    {
        return '[
            {
                "id": "123456789",
                "administration_id": "123",
                "financial_account_id": "456789123",
                "reference": "Statement 2023-01",
                "official_date": "2023-01-31",
                "official_balance": "1000.00",
                "importer_service": "bank",
                "financial_account_name": "Bank Account",
                "created_at": "2023-01-31T12:00:00.000Z",
                "updated_at": "2023-01-31T12:00:00.000Z",
                "financial_mutations": []
            },
            {
                "id": "987654321",
                "administration_id": "123",
                "financial_account_id": "456789123",
                "reference": "Statement 2023-02",
                "official_date": "2023-02-28",
                "official_balance": "1500.00",
                "importer_service": "bank",
                "financial_account_name": "Bank Account",
                "created_at": "2023-02-28T12:00:00.000Z",
                "updated_at": "2023-02-28T12:00:00.000Z",
                "financial_mutations": []
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
            "reference": "Statement 2023-01",
            "official_date": "2023-01-31",
            "official_balance": "1000.00",
            "importer_service": "bank",
            "financial_account_name": "Bank Account",
            "created_at": "2023-01-31T12:00:00.000Z",
            "updated_at": "2023-01-31T12:00:00.000Z",
            "financial_mutations": []
        }';
    }

    public static function create(): string
    {
        return '{
            "id": "123456789",
            "administration_id": "123",
            "financial_account_id": "456789123",
            "reference": "New Statement",
            "official_date": "2023-03-31",
            "official_balance": "2000.00",
            "importer_service": "bank",
            "financial_account_name": "Bank Account",
            "created_at": "2023-03-31T12:00:00.000Z",
            "updated_at": "2023-03-31T12:00:00.000Z",
            "financial_mutations": []
        }';
    }

    public static function update(): string
    {
        return '{
            "id": "123456789",
            "administration_id": "123",
            "financial_account_id": "456789123",
            "reference": "Updated Statement",
            "official_date": "2023-01-31",
            "official_balance": "1000.00",
            "importer_service": "bank",
            "financial_account_name": "Bank Account",
            "created_at": "2023-01-31T12:00:00.000Z",
            "updated_at": "2023-03-31T12:00:00.000Z",
            "financial_mutations": []
        }';
    }
}
