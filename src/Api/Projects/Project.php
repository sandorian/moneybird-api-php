<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Projects;

use Sandorian\Moneybird\Api\Support\BaseDto;

class Project extends BaseDto
{
    public function __construct(
        public readonly string $id,
        public readonly string $administration_id,
        public readonly ?string $name = null,
        public readonly ?string $state = null,
        public readonly ?string $created_at = null,
        public readonly ?string $updated_at = null,
    ) {
        //
    }

    public static function createFromResponseData(array $data): static
    {
        return new static(
            id: $data['id'],
            administration_id: $data['administration_id'],
            name: $data['name'] ?? null,
            state: $data['state'] ?? null,
            created_at: $data['created_at'] ?? null,
            updated_at: $data['updated_at'] ?? null,
        );
    }
}
