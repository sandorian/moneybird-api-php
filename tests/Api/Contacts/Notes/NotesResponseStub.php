<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Tests\Api\Contacts\Notes;

class NotesResponseStub
{
    public static function create(): string
    {
        return '{
            "id": "123456789",
            "note": "Test Note",
            "todo": "false",
            "assignee_id": null,
            "todo_type": null,
            "completed_at": null,
            "completed_by_id": null,
            "created_at": "2023-01-01T12:00:00.000Z",
            "updated_at": "2023-01-01T12:00:00.000Z"
        }';
    }
}
