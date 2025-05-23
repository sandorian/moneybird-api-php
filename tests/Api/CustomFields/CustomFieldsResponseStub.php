<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Tests\Api\CustomFields;

class CustomFieldsResponseStub
{
    public static function getAll(): string
    {
        return '[
            {
                "id": "123456789",
                "administration_id": "987654321",
                "name": "Test Custom Field",
                "source": "sales_invoice",
                "created_at": "2023-01-01T12:00:00.000Z",
                "updated_at": "2023-01-01T12:00:00.000Z"
            },
            {
                "id": "987654321",
                "administration_id": "987654321",
                "name": "Another Custom Field",
                "source": "contact",
                "created_at": "2023-01-02T12:00:00.000Z",
                "updated_at": "2023-01-02T12:00:00.000Z"
            }
        ]';
    }

    public static function get(): string
    {
        return '{
            "id": "123456789",
            "administration_id": "987654321",
            "name": "Test Custom Field",
            "source": "sales_invoice",
            "created_at": "2023-01-01T12:00:00.000Z",
            "updated_at": "2023-01-01T12:00:00.000Z"
        }';
    }
}
