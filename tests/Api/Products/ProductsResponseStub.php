<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Tests\Api\Products;

class ProductsResponseStub
{
    public static function getProducts(): string
    {
        return '[
            {
                "id": "123456789012345678",
                "administration_id": "123456789012345678",
                "title": "Test Product",
                "description": "Test Description",
                "price": "10.00",
                "ledger_account_id": "123456789012345678",
                "tax_rate_id": "123456789012345678",
                "created_at": "2023-01-01T12:00:00.000Z",
                "updated_at": "2023-01-01T12:00:00.000Z"
            }
        ]';
    }

    public static function getProduct(): string
    {
        return '{
            "id": "123456789012345678",
            "administration_id": "123456789012345678",
            "title": "Test Product",
            "description": "Test Description",
            "price": "10.00",
            "ledger_account_id": "123456789012345678",
            "tax_rate_id": "123456789012345678",
            "created_at": "2023-01-01T12:00:00.000Z",
            "updated_at": "2023-01-01T12:00:00.000Z"
        }';
    }

    public static function createProduct(): string
    {
        return self::getProduct();
    }

    public static function updateProduct(): string
    {
        return self::getProduct();
    }

    public static function deleteProduct(): string
    {
        return '';
    }

    public static function getProductsSynchronization(): string
    {
        return '[
            {
                "id": "123456789012345678",
                "version": 1
            }
        ]';
    }

    public static function postProductsSynchronization(): string
    {
        return self::getProducts();
    }
}
