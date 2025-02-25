<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\FinancialAccounts;

use Sandorian\Moneybird\Api\Support\BaseDto;

class FinancialAccount extends BaseDto
{
    public function __construct(
        public readonly string $id,
        public readonly string $administration_id,
        public readonly ?string $type = null,
        public readonly ?string $name = null,
        public readonly ?string $identifier = null,
        public readonly ?string $currency = null,
        public readonly ?string $provider = null,
        public readonly ?bool $active = null,
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
            type: $data['type'] ?? null,
            name: $data['name'] ?? null,
            identifier: $data['identifier'] ?? null,
            currency: $data['currency'] ?? null,
            provider: $data['provider'] ?? null,
            active: $data['active'] ?? null,
            created_at: $data['created_at'] ?? null,
            updated_at: $data['updated_at'] ?? null,
        );
    }
}
