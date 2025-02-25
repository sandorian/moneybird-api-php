<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Payments;

use Sandorian\Moneybird\Api\Support\BaseDto;

class Payment extends BaseDto
{
    public function __construct(
        public readonly string $id,
        public readonly string $administration_id,
        public readonly ?string $invoice_id = null,
        public readonly ?string $invoice_type = null,
        public readonly ?string $financial_account_id = null,
        public readonly ?string $financial_mutation_id = null,
        public readonly ?string $transaction_identifier = null,
        public readonly ?string $price = null,
        public readonly ?string $price_base = null,
        public readonly ?string $payment_date = null,
        public readonly ?string $currency = null,
        public readonly ?string $payment_method = null,
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
            invoice_id: $data['invoice_id'] ?? null,
            invoice_type: $data['invoice_type'] ?? null,
            financial_account_id: $data['financial_account_id'] ?? null,
            financial_mutation_id: $data['financial_mutation_id'] ?? null,
            transaction_identifier: $data['transaction_identifier'] ?? null,
            price: $data['price'] ?? null,
            price_base: $data['price_base'] ?? null,
            payment_date: $data['payment_date'] ?? null,
            currency: $data['currency'] ?? null,
            payment_method: $data['payment_method'] ?? null,
            created_at: $data['created_at'] ?? null,
            updated_at: $data['updated_at'] ?? null,
        );
    }
}
