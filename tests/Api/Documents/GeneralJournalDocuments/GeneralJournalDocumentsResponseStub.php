<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Tests\Api\Documents\GeneralJournalDocuments;

class GeneralJournalDocumentsResponseStub
{
    public static function getAll(): string
    {
        return '[
            {
                "id": "123456789",
                "administration_id": "987654321",
                "contact_id": "456789123",
                "reference": "Test Journal Document",
                "date": "2023-01-01",
                "entry_number": "123",
                "state": "open",
                "origin": "user",
                "details": [],
                "payments": [],
                "notes": [],
                "attachments": [],
                "events": [],
                "created_at": "2023-01-01T12:00:00.000Z",
                "updated_at": "2023-01-01T12:00:00.000Z"
            },
            {
                "id": "987654321",
                "administration_id": "987654321",
                "contact_id": "123456789",
                "reference": "Another Journal Document",
                "date": "2023-02-01",
                "entry_number": "456",
                "state": "open",
                "origin": "user",
                "details": [],
                "payments": [],
                "notes": [],
                "attachments": [],
                "events": [],
                "created_at": "2023-02-01T12:00:00.000Z",
                "updated_at": "2023-02-01T12:00:00.000Z"
            }
        ]';
    }

    public static function get(): string
    {
        return '{
            "id": "123456789",
            "administration_id": "987654321",
            "contact_id": "456789123",
            "reference": "Test Journal Document",
            "date": "2023-01-01",
            "entry_number": "123",
            "state": "open",
            "origin": "user",
            "details": [],
            "payments": [],
            "notes": [],
            "attachments": [],
            "events": [],
            "created_at": "2023-01-01T12:00:00.000Z",
            "updated_at": "2023-01-01T12:00:00.000Z"
        }';
    }

    public static function synchronization(): string
    {
        return '[
            {
                "id": "123456789",
                "version": 1
            },
            {
                "id": "987654321",
                "version": 1
            }
        ]';
    }

    public static function create(): string
    {
        return '{
            "id": "123456789",
            "administration_id": "987654321",
            "contact_id": "456789123",
            "reference": "New Journal Document",
            "date": "2023-03-01",
            "entry_number": "789",
            "state": "open",
            "origin": "user",
            "details": [],
            "payments": [],
            "notes": [],
            "attachments": [],
            "events": [],
            "created_at": "2023-03-01T12:00:00.000Z",
            "updated_at": "2023-03-01T12:00:00.000Z"
        }';
    }

    public static function update(): string
    {
        return '{
            "id": "123456789",
            "administration_id": "987654321",
            "contact_id": "456789123",
            "reference": "Updated Journal Document",
            "date": "2023-01-01",
            "entry_number": "123",
            "state": "open",
            "origin": "user",
            "details": [],
            "payments": [],
            "notes": [],
            "attachments": [],
            "events": [],
            "created_at": "2023-01-01T12:00:00.000Z",
            "updated_at": "2023-03-01T12:00:00.000Z"
        }';
    }

    public static function createAttachment(): string
    {
        return '{
            "id": "123456789",
            "filename": "test.pdf",
            "content_type": "application/pdf",
            "size": 12345,
            "created_at": "2023-03-01T12:00:00.000Z",
            "updated_at": "2023-03-01T12:00:00.000Z"
        }';
    }
}
