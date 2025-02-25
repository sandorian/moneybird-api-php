<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\LedgerAccounts;

use Sandorian\Moneybird\Api\Support\BaseDto;

class LedgerAccount extends BaseDto
{
    public function __construct(
        public readonly string $id,
        public readonly string $administration_id,
        public readonly ?string $name = null,
        public readonly ?string $account_type = null,
        public readonly ?string $account_id = null,
        public readonly ?bool $parent = null,
        public readonly ?bool $allowed_document_types = null,
        public readonly ?string $description = null,
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
            account_type: $data['account_type'] ?? null,
            account_id: $data['account_id'] ?? null,
            parent: $data['parent'] ?? null,
            allowed_document_types: $data['allowed_document_types'] ?? null,
            description: $data['description'] ?? null,
            created_at: $data['created_at'] ?? null,
            updated_at: $data['updated_at'] ?? null,
        );
    }
}
