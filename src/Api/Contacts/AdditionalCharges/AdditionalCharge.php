<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Contacts\AdditionalCharges;

use Sandorian\Moneybird\Api\Support\BaseDto;

class AdditionalCharge extends BaseDto
{
    public function __construct(
        public readonly string $id,
        public readonly string $contact_id,
        public readonly string $description,
        public readonly string $price,
        public readonly ?string $period,
        public readonly ?string $created_at,
        public readonly ?string $updated_at,
    ) {
        //
    }

    public static function createFromResponseData(array $data): static
    {
        return new static(
            id: $data['id'],
            contact_id: $data['contact_id'],
            description: $data['description'],
            price: $data['price'],
            period: $data['period'] ?? null,
            created_at: $data['created_at'] ?? null,
            updated_at: $data['updated_at'] ?? null,
        );
    }
}
