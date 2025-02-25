<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Tests\Api\Identities;

class IdentitiesResponseStub
{
    public static function getAll(): string
    {
        return '[
            {
                "id": "123456789",
                "administration_id": "123",
                "company_name": "Company A",
                "city": "Amsterdam",
                "country": "NL",
                "zipcode": "1000AA",
                "address1": "Street 1",
                "address2": "",
                "email": "info@companya.com",
                "phone": "0201234567",
                "delivery_method": "Email",
                "customer_id": "CUST001",
                "tax_number": "NL123456789B01",
                "chamber_of_commerce": "12345678",
                "bank_account": "NL12ABCD1234567890",
                "attention": "",
                "created_at": "2023-01-01T12:00:00.000Z",
                "updated_at": "2023-01-01T12:00:00.000Z",
                "custom_fields": {},
                "tax_rates": []
            },
            {
                "id": "987654321",
                "administration_id": "123",
                "company_name": "Company B",
                "city": "Rotterdam",
                "country": "NL",
                "zipcode": "2000BB",
                "address1": "Street 2",
                "address2": "",
                "email": "info@companyb.com",
                "phone": "0107654321",
                "delivery_method": "Email",
                "customer_id": "CUST002",
                "tax_number": "NL987654321B01",
                "chamber_of_commerce": "87654321",
                "bank_account": "NL98WXYZ9876543210",
                "attention": "",
                "created_at": "2023-01-02T12:00:00.000Z",
                "updated_at": "2023-01-02T12:00:00.000Z",
                "custom_fields": {},
                "tax_rates": []
            }
        ]';
    }

    public static function get(): string
    {
        return '{
            "id": "123456789",
            "administration_id": "123",
            "company_name": "Company A",
            "city": "Amsterdam",
            "country": "NL",
            "zipcode": "1000AA",
            "address1": "Street 1",
            "address2": "",
            "email": "info@companya.com",
            "phone": "0201234567",
            "delivery_method": "Email",
            "customer_id": "CUST001",
            "tax_number": "NL123456789B01",
            "chamber_of_commerce": "12345678",
            "bank_account": "NL12ABCD1234567890",
            "attention": "",
            "created_at": "2023-01-01T12:00:00.000Z",
            "updated_at": "2023-01-01T12:00:00.000Z",
            "custom_fields": {},
            "tax_rates": []
        }';
    }
}
