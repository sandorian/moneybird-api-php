<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Tests\Api\LedgerAccounts;

class LedgerAccountsResponseStub
{
    public static function getAll(): string
    {
        return '[
            {
                "id": "123456789",
                "administration_id": "123",
                "name": "Ledger Account 1",
                "account_type": "revenue",
                "account_id": "1000",
                "parent": false,
                "allowed_document_types": ["sales_invoice", "purchase_invoice"],
                "description": "Revenue account",
                "created_at": "2023-01-01T12:00:00.000Z",
                "updated_at": "2023-01-01T12:00:00.000Z"
            },
            {
                "id": "987654321",
                "administration_id": "123",
                "name": "Ledger Account 2",
                "account_type": "expense",
                "account_id": "2000",
                "parent": false,
                "allowed_document_types": ["purchase_invoice"],
                "description": "Expense account",
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
            "name": "Ledger Account 1",
            "account_type": "revenue",
            "account_id": "1000",
            "parent": false,
            "allowed_document_types": ["sales_invoice", "purchase_invoice"],
            "description": "Revenue account",
            "created_at": "2023-01-01T12:00:00.000Z",
            "updated_at": "2023-01-01T12:00:00.000Z"
        }';
    }

    public static function create(): string
    {
        return '{
            "id": "123456789",
            "administration_id": "123",
            "name": "New Ledger Account",
            "account_type": "revenue",
            "account_id": "3000",
            "parent": false,
            "allowed_document_types": ["sales_invoice"],
            "description": "New revenue account",
            "created_at": "2023-01-03T12:00:00.000Z",
            "updated_at": "2023-01-03T12:00:00.000Z"
        }';
    }

    public static function update(): string
    {
        return '{
            "id": "123456789",
            "administration_id": "123",
            "name": "Updated Ledger Account",
            "account_type": "revenue",
            "account_id": "1000",
            "parent": false,
            "allowed_document_types": ["sales_invoice", "purchase_invoice", "receipt"],
            "description": "Updated revenue account",
            "created_at": "2023-01-01T12:00:00.000Z",
            "updated_at": "2023-01-03T12:00:00.000Z"
        }';
    }
}
