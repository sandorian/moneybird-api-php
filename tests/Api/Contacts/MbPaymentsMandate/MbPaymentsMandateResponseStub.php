<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Tests\Api\Contacts\MbPaymentsMandate;

class MbPaymentsMandateResponseStub
{
    public static function get(): string
    {
        return '{
            "id": "123456789",
            "contact_id": "987654321",
            "mandate_id": "MB123456789",
            "flow_id": "FLOW123456789",
            "state": "active",
            "created_at": "2023-01-01T12:00:00.000Z",
            "updated_at": "2023-01-01T12:00:00.000Z"
        }';
    }

    public static function create(): string
    {
        return '{
            "id": "123456789",
            "contact_id": "987654321",
            "mandate_id": "MB123456789",
            "flow_id": "FLOW123456789",
            "state": "active",
            "created_at": "2023-01-01T12:00:00.000Z",
            "updated_at": "2023-01-01T12:00:00.000Z"
        }';
    }

    public static function createUrl(): string
    {
        return '{
            "url": "https://moneybird.com/mandate/setup/123456789"
        }';
    }
}
