<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\FinancialMutations;

use Sandorian\Moneybird\Api\Support\BaseDto;

class FinancialMutation extends BaseDto
{
    /**
     * @param  array<string, mixed>|null  $ledger_account_bookings
     * @param  array<string, mixed>|null  $payments
     */
    public function __construct(
        public readonly string $id,
        public readonly string $administration_id,
        public readonly ?string $financial_account_id = null,
        public readonly ?string $type = null,
        public readonly ?string $amount = null,
        public readonly ?string $code = null,
        public readonly ?string $date = null,
        public readonly ?string $message = null,
        public readonly ?string $contra_account_name = null,
        public readonly ?string $contra_account_number = null,
        public readonly ?string $batch_reference = null,
        public readonly ?string $offset_id = null,
        public readonly ?string $sepa_fields = null,
        public readonly ?string $created_at = null,
        public readonly ?string $updated_at = null,
        public readonly ?array $ledger_account_bookings = null,
        public readonly ?array $payments = null,
    ) {
        //
    }

    public static function createFromResponseData(array $data): static
    {
        return new static(
            id: $data['id'],
            administration_id: $data['administration_id'],
            financial_account_id: $data['financial_account_id'] ?? null,
            type: $data['type'] ?? null,
            amount: $data['amount'] ?? null,
            code: $data['code'] ?? null,
            date: $data['date'] ?? null,
            message: $data['message'] ?? null,
            contra_account_name: $data['contra_account_name'] ?? null,
            contra_account_number: $data['contra_account_number'] ?? null,
            batch_reference: $data['batch_reference'] ?? null,
            offset_id: $data['offset_id'] ?? null,
            sepa_fields: $data['sepa_fields'] ?? null,
            created_at: $data['created_at'] ?? null,
            updated_at: $data['updated_at'] ?? null,
            ledger_account_bookings: $data['ledger_account_bookings'] ?? null,
            payments: $data['payments'] ?? null,
        );
    }
}
