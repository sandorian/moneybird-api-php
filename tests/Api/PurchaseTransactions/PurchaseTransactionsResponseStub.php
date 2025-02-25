<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Tests\Api\PurchaseTransactions;

class PurchaseTransactionsResponseStub
{
    public static function getAll(): string
    {
        return '[
            {
                "id": "123456789012345678",
                "administration_id": "123456789012345678",
                "contact_id": "123456789012345678",
                "reference": "INV-001",
                "date": "2023-01-01",
                "due_date": "2023-01-31",
                "entry_number": 1,
                "state": "open",
                "currency": "EUR",
                "exchange_rate": "1.0",
                "revenue_invoice": false,
                "prices_are_incl_tax": true,
                "origin": "api",
                "paid_at": null,
                "tax_number": null,
                "total_price_excl_tax": "100.00",
                "total_price_excl_tax_base": "100.00",
                "total_price_incl_tax": "121.00",
                "total_price_incl_tax_base": "121.00",
                "created_at": "2023-01-01T12:00:00.000Z",
                "updated_at": "2023-01-01T12:00:00.000Z",
                "details": [
                    {
                        "id": "123456789012345678",
                        "administration_id": "123456789012345678",
                        "tax_rate_id": "123456789012345678",
                        "ledger_account_id": "123456789012345678",
                        "project_id": null,
                        "product_id": null,
                        "amount": "1",
                        "amount_decimal": "1.0",
                        "description": "Test Product",
                        "price": "100.00",
                        "period": null,
                        "row_order": 0,
                        "total_price_excl_tax": "100.00",
                        "total_price_excl_tax_base": "100.00",
                        "total_price_incl_tax": "121.00",
                        "total_price_incl_tax_base": "121.00",
                        "tax_report_reference": null,
                        "created_at": "2023-01-01T12:00:00.000Z",
                        "updated_at": "2023-01-01T12:00:00.000Z"
                    }
                ],
                "payments": [],
                "notes": []
            }
        ]';
    }

    public static function get(): string
    {
        return '{
            "id": "123456789012345678",
            "administration_id": "123456789012345678",
            "contact_id": "123456789012345678",
            "reference": "INV-001",
            "date": "2023-01-01",
            "due_date": "2023-01-31",
            "entry_number": 1,
            "state": "open",
            "currency": "EUR",
            "exchange_rate": "1.0",
            "revenue_invoice": false,
            "prices_are_incl_tax": true,
            "origin": "api",
            "paid_at": null,
            "tax_number": null,
            "total_price_excl_tax": "100.00",
            "total_price_excl_tax_base": "100.00",
            "total_price_incl_tax": "121.00",
            "total_price_incl_tax_base": "121.00",
            "created_at": "2023-01-01T12:00:00.000Z",
            "updated_at": "2023-01-01T12:00:00.000Z",
            "details": [
                {
                    "id": "123456789012345678",
                    "administration_id": "123456789012345678",
                    "tax_rate_id": "123456789012345678",
                    "ledger_account_id": "123456789012345678",
                    "project_id": null,
                    "product_id": null,
                    "amount": "1",
                    "amount_decimal": "1.0",
                    "description": "Test Product",
                    "price": "100.00",
                    "period": null,
                    "row_order": 0,
                    "total_price_excl_tax": "100.00",
                    "total_price_excl_tax_base": "100.00",
                    "total_price_incl_tax": "121.00",
                    "total_price_incl_tax_base": "121.00",
                    "tax_report_reference": null,
                    "created_at": "2023-01-01T12:00:00.000Z",
                    "updated_at": "2023-01-01T12:00:00.000Z"
                }
            ],
            "payments": [],
            "notes": []
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
}
