<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Tests\Api\ImportMappings;

class ImportMappingsResponseStub
{
    public static function getAll(): string
    {
        return '[
            {
                "id": "123456789",
                "administration_id": "123",
                "name": "Import Mapping 1",
                "entity_type": "SalesInvoice",
                "default_ledger_account_id": "456789123",
                "default_tax_rate_id": "789123456",
                "created_at": "2023-01-01T12:00:00.000Z",
                "updated_at": "2023-01-01T12:00:00.000Z",
                "mapping_attributes": {}
            },
            {
                "id": "987654321",
                "administration_id": "123",
                "name": "Import Mapping 2",
                "entity_type": "PurchaseInvoice",
                "default_ledger_account_id": "654321987",
                "default_tax_rate_id": "321987654",
                "created_at": "2023-01-02T12:00:00.000Z",
                "updated_at": "2023-01-02T12:00:00.000Z",
                "mapping_attributes": {}
            }
        ]';
    }

    public static function get(): string
    {
        return '{
            "id": "123456789",
            "administration_id": "123",
            "name": "Import Mapping 1",
            "entity_type": "SalesInvoice",
            "default_ledger_account_id": "456789123",
            "default_tax_rate_id": "789123456",
            "created_at": "2023-01-01T12:00:00.000Z",
            "updated_at": "2023-01-01T12:00:00.000Z",
            "mapping_attributes": {}
        }';
    }

    public static function create(): string
    {
        return '{
            "id": "123456789",
            "administration_id": "123",
            "name": "New Import Mapping",
            "entity_type": "SalesInvoice",
            "default_ledger_account_id": "456789123",
            "default_tax_rate_id": "789123456",
            "created_at": "2023-01-03T12:00:00.000Z",
            "updated_at": "2023-01-03T12:00:00.000Z",
            "mapping_attributes": {}
        }';
    }

    public static function update(): string
    {
        return '{
            "id": "123456789",
            "administration_id": "123",
            "name": "Updated Import Mapping",
            "entity_type": "SalesInvoice",
            "default_ledger_account_id": "456789123",
            "default_tax_rate_id": "789123456",
            "created_at": "2023-01-01T12:00:00.000Z",
            "updated_at": "2023-01-03T12:00:00.000Z",
            "mapping_attributes": {}
        }';
    }
}
