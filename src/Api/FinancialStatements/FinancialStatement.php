<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\FinancialStatements;

use Sandorian\Moneybird\Api\Support\BaseDto;

class FinancialStatement extends BaseDto
{
    /**
     * @param  array<string, mixed>|null  $financial_mutations
     */
    public function __construct(
        public readonly string $id,
        public readonly string $administration_id,
        public readonly ?string $financial_account_id = null,
        public readonly ?string $reference = null,
        public readonly ?string $official_date = null,
        public readonly ?string $official_balance = null,
        public readonly ?string $importer_service = null,
        public readonly ?string $financial_account_name = null,
        public readonly ?string $created_at = null,
        public readonly ?string $updated_at = null,
        public readonly ?array $financial_mutations = null,
    ) {
        //
    }

    public static function createFromResponseData(array $data): static
    {
        return new static(
            id: $data['id'],
            administration_id: $data['administration_id'],
            financial_account_id: $data['financial_account_id'] ?? null,
            reference: $data['reference'] ?? null,
            official_date: $data['official_date'] ?? null,
            official_balance: $data['official_balance'] ?? null,
            importer_service: $data['importer_service'] ?? null,
            financial_account_name: $data['financial_account_name'] ?? null,
            created_at: $data['created_at'] ?? null,
            updated_at: $data['updated_at'] ?? null,
            financial_mutations: $data['financial_mutations'] ?? null,
        );
    }
}
