<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Tests\Api\Contacts\AdditionalCharges;

class AdditionalChargesResponseStub
{
    public static function getAll(): string
    {
        return '[
            {
                "id": "123456789",
                "contact_id": "987654321",
                "description": "Test Additional Charge",
                "price": "10.00",
                "period": "monthly",
                "created_at": "2023-01-01T12:00:00.000Z",
                "updated_at": "2023-01-01T12:00:00.000Z"
            },
            {
                "id": "987654321",
                "contact_id": "987654321",
                "description": "Another Additional Charge",
                "price": "20.00",
                "period": "yearly",
                "created_at": "2023-01-02T12:00:00.000Z",
                "updated_at": "2023-01-02T12:00:00.000Z"
            }
        ]';
    }

    public static function create(): string
    {
        return '{
            "id": "123456789",
            "contact_id": "987654321",
            "description": "Test Additional Charge",
            "price": "10.00",
            "period": "monthly",
            "created_at": "2023-01-01T12:00:00.000Z",
            "updated_at": "2023-01-01T12:00:00.000Z"
        }';
    }
}
