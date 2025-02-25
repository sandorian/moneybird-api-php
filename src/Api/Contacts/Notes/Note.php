<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Contacts\Notes;

use Sandorian\Moneybird\Api\Support\BaseDto;

class Note extends BaseDto
{
    public function __construct(
        public readonly string $id,
        public readonly string $note,
        public readonly string $todo,
        public readonly ?string $assignee_id,
        public readonly ?string $todo_type,
        public readonly ?string $completed_at,
        public readonly ?string $completed_by_id,
        public readonly ?string $created_at,
        public readonly ?string $updated_at,
    ) {
        //
    }

    public static function createFromResponseData(array $data): static
    {
        return new static(
            id: $data['id'],
            note: $data['note'],
            todo: $data['todo'],
            assignee_id: $data['assignee_id'] ?? null,
            todo_type: $data['todo_type'] ?? null,
            completed_at: $data['completed_at'] ?? null,
            completed_by_id: $data['completed_by_id'] ?? null,
            created_at: $data['created_at'] ?? null,
            updated_at: $data['updated_at'] ?? null,
        );
    }
}
