<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Tests\Api\Contacts\ContactPeople;

class ContactPeopleResponseStub
{
    public static function get(): string
    {
        return '{
            "id": "123456789",
            "contact_id": "987654321",
            "firstname": "John",
            "lastname": "Doe",
            "phone": "1234567890",
            "email": "john.doe@example.com",
            "department": "Sales",
            "active": true,
            "created_at": "2023-01-01T12:00:00.000Z",
            "updated_at": "2023-01-01T12:00:00.000Z"
        }';
    }

    public static function create(): string
    {
        return '{
            "id": "123456789",
            "contact_id": "987654321",
            "firstname": "John",
            "lastname": "Doe",
            "phone": "1234567890",
            "email": "john.doe@example.com",
            "department": "Sales",
            "active": true,
            "created_at": "2023-01-01T12:00:00.000Z",
            "updated_at": "2023-01-01T12:00:00.000Z"
        }';
    }

    public static function update(): string
    {
        return '{
            "id": "123456789",
            "contact_id": "987654321",
            "firstname": "John",
            "lastname": "Smith",
            "phone": "1234567890",
            "email": "john.smith@example.com",
            "department": "Marketing",
            "active": true,
            "created_at": "2023-01-01T12:00:00.000Z",
            "updated_at": "2023-01-02T12:00:00.000Z"
        }';
    }
}
