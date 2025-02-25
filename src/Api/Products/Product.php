<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Products;

use Sandorian\Moneybird\Api\Support\BaseDto;

class Product extends BaseDto
{
    public function __construct(
        public readonly string $id,
        public readonly string $administration_id,
        public readonly ?string $title = null,
        public readonly ?string $description = null,
        public readonly ?string $identifier = null,
        public readonly ?string $price = null,
        public readonly ?string $tax_rate_id = null,
        public readonly ?string $ledger_account_id = null,
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
            title: $data['title'] ?? null,
            description: $data['description'] ?? null,
            identifier: $data['identifier'] ?? null,
            price: $data['price'] ?? null,
            tax_rate_id: $data['tax_rate_id'] ?? null,
            ledger_account_id: $data['ledger_account_id'] ?? null,
            active: $data['active'] ?? null,
            created_at: $data['created_at'] ?? null,
            updated_at: $data['updated_at'] ?? null,
        );
    }
}
