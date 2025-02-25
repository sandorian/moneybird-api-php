<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\RecurringSalesInvoices;

use Sandorian\Moneybird\Api\Support\BaseDto;

class RecurringSalesInvoice extends BaseDto
{
    public function __construct(
        public readonly string $id,
        public readonly string $administration_id,
        public readonly ?string $contact_id = null,
        public readonly ?string $contact = null,
        public readonly ?string $workflow_id = null,
        public readonly ?string $state = null,
        public readonly ?string $start_date = null,
        public readonly ?string $invoice_period = null,
        public readonly ?string $invoice_interval = null,
        public readonly ?string $frequency_type = null,
        public readonly ?string $frequency = null,
        public readonly ?string $reference = null,
        public readonly ?string $language = null,
        public readonly ?string $currency = null,
        public readonly ?string $discount = null,
        public readonly ?string $first_due_interval = null,
        public readonly ?bool $auto_send = null,
        public readonly ?string $sending_scheduled_at = null,
        public readonly ?string $sending_method = null,
        public readonly ?string $created_at = null,
        public readonly ?string $updated_at = null,
        public readonly ?array $details = null,
        public readonly ?array $notes = null,
        public readonly ?array $attachments = null,
        public readonly ?array $custom_fields = null,
    ) {
        //
    }

    public static function createFromResponseData(array $data): static
    {
        return new static(
            id: $data['id'],
            administration_id: $data['administration_id'],
            contact_id: $data['contact_id'] ?? null,
            contact: $data['contact'] ?? null,
            workflow_id: $data['workflow_id'] ?? null,
            state: $data['state'] ?? null,
            start_date: $data['start_date'] ?? null,
            invoice_period: $data['invoice_period'] ?? null,
            invoice_interval: $data['invoice_interval'] ?? null,
            frequency_type: $data['frequency_type'] ?? null,
            frequency: $data['frequency'] ?? null,
            reference: $data['reference'] ?? null,
            language: $data['language'] ?? null,
            currency: $data['currency'] ?? null,
            discount: $data['discount'] ?? null,
            first_due_interval: $data['first_due_interval'] ?? null,
            auto_send: $data['auto_send'] ?? null,
            sending_scheduled_at: $data['sending_scheduled_at'] ?? null,
            sending_method: $data['sending_method'] ?? null,
            created_at: $data['created_at'] ?? null,
            updated_at: $data['updated_at'] ?? null,
            details: $data['details'] ?? null,
            notes: $data['notes'] ?? null,
            attachments: $data['attachments'] ?? null,
            custom_fields: $data['custom_fields'] ?? null,
        );
    }
}
