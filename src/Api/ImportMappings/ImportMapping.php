<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\ImportMappings;

use Sandorian\Moneybird\Api\Support\BaseDto;

class ImportMapping extends BaseDto
{
    /**
     * @param  array<string, mixed>|null  $mapping_attributes
     */
    public function __construct(
        public readonly string $id,
        public readonly string $administration_id,
        public readonly ?string $name = null,
        public readonly ?string $entity_type = null,
        public readonly ?string $default_ledger_account_id = null,
        public readonly ?string $default_tax_rate_id = null,
        public readonly ?string $created_at = null,
        public readonly ?string $updated_at = null,
        public readonly ?array $mapping_attributes = null,
    ) {
        //
    }

    public static function createFromResponseData(array $data): static
    {
        return new static(
            id: $data['id'],
            administration_id: $data['administration_id'],
            name: $data['name'] ?? null,
            entity_type: $data['entity_type'] ?? null,
            default_ledger_account_id: $data['default_ledger_account_id'] ?? null,
            default_tax_rate_id: $data['default_tax_rate_id'] ?? null,
            created_at: $data['created_at'] ?? null,
            updated_at: $data['updated_at'] ?? null,
            mapping_attributes: $data['mapping_attributes'] ?? null,
        );
    }
}
