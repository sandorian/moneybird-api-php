<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Contacts\MbPaymentsMandate;

use Sandorian\Moneybird\Api\Support\BaseDto;

class MbPaymentsMandate extends BaseDto
{
    public function __construct(
        public readonly string $id,
        public readonly string $contact_id,
        public readonly ?string $mandate_id,
        public readonly ?string $flow_id,
        public readonly ?string $state,
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
            mandate_id: $data['mandate_id'] ?? null,
            flow_id: $data['flow_id'] ?? null,
            state: $data['state'] ?? null,
            created_at: $data['created_at'] ?? null,
            updated_at: $data['updated_at'] ?? null,
        );
    }
}
