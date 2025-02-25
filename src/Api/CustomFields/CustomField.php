<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\CustomFields;

use Sandorian\Moneybird\Api\Support\BaseDto;

class CustomField extends BaseDto
{
    public function __construct(
        public readonly string $id,
        public readonly string $administration_id,
        public readonly string $name,
        public readonly string $source,
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
            name: $data['name'],
            source: $data['source'],
            created_at: $data['created_at'] ?? null,
            updated_at: $data['updated_at'] ?? null,
        );
    }
}
