<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Documents\GeneralJournalDocuments;

use Sandorian\Moneybird\Api\Support\BaseDto;

class GeneralJournalDocument extends BaseDto
{
    /**
     * @param  array<string, mixed>|null  $details
     * @param  array<string, mixed>|null  $payments
     * @param  array<string, mixed>|null  $notes
     * @param  array<string, mixed>|null  $attachments
     * @param  array<string, mixed>|null  $events
     */
    public function __construct(
        public readonly string $id,
        public readonly string $administration_id,
        public readonly ?string $contact_id = null,
        public readonly ?string $reference = null,
        public readonly ?string $date = null,
        public readonly ?string $entry_number = null,
        public readonly ?string $state = null,
        public readonly ?string $origin = null,
        public readonly ?array $details = null,
        public readonly ?array $payments = null,
        public readonly ?array $notes = null,
        public readonly ?array $attachments = null,
        public readonly ?array $events = null,
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
            contact_id: $data['contact_id'] ?? null,
            reference: $data['reference'] ?? null,
            date: $data['date'] ?? null,
            entry_number: $data['entry_number'] ?? null,
            state: $data['state'] ?? null,
            origin: $data['origin'] ?? null,
            details: $data['details'] ?? null,
            payments: $data['payments'] ?? null,
            notes: $data['notes'] ?? null,
            attachments: $data['attachments'] ?? null,
            events: $data['events'] ?? null,
            created_at: $data['created_at'] ?? null,
            updated_at: $data['updated_at'] ?? null,
        );
    }
}
