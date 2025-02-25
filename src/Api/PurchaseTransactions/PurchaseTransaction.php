<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\PurchaseTransactions;

use Sandorian\Moneybird\Api\Support\BaseDto;

class PurchaseTransaction extends BaseDto
{
    public function __construct(
        public readonly string $id,
        public readonly string $administration_id,
        public readonly ?string $contact_id = null,
        public readonly ?string $reference = null,
        public readonly ?string $date = null,
        public readonly ?string $due_date = null,
        public readonly ?string $price = null,
        public readonly ?string $currency = null,
        public readonly ?string $payment_method = null,
        public readonly ?string $state = null,
        public readonly ?string $created_at = null,
        public readonly ?string $updated_at = null,
        public readonly ?array $details = null,
    ) {
        //
    }

    public static function createFromResponseData(array $data): static
    {
        return new static(
            id: $data['id'],
            administration_id: $data['administration_id'],
            contact_id: $data['contact_id'] ?? null,
            reference: $data['reference'] ?? null,
            date: $data['date'] ?? null,
            due_date: $data['due_date'] ?? null,
            price: $data['price'] ?? null,
            currency: $data['currency'] ?? null,
            payment_method: $data['payment_method'] ?? null,
            state: $data['state'] ?? null,
            created_at: $data['created_at'] ?? null,
            updated_at: $data['updated_at'] ?? null,
            details: $data['details'] ?? null,
        );
    }
}
