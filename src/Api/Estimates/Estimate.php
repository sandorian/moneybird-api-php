<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Estimates;

use Sandorian\Moneybird\Api\Support\BaseDto;

class Estimate extends BaseDto
{
    /**
     * @param  array<string, mixed>|null  $contact
     * @param  array<string, mixed>|null  $details
     * @param  array<string, mixed>|null  $custom_fields
     * @param  array<string, mixed>|null  $notes
     * @param  array<string, mixed>|null  $events
     */
    public function __construct(
        public readonly string $id,
        public readonly string $administration_id,
        public readonly ?string $contact_id = null,
        public readonly ?array $contact = null,
        public readonly ?string $estimate_id = null,
        public readonly ?string $workflow_id = null,
        public readonly ?string $document_style_id = null,
        public readonly ?string $identity_id = null,
        public readonly ?string $state = null,
        public readonly ?string $estimate_date = null,
        public readonly ?string $due_date = null,
        public readonly ?string $reference = null,
        public readonly ?string $language = null,
        public readonly ?string $currency = null,
        public readonly ?string $exchange_rate = null,
        public readonly ?string $discount = null,
        public readonly ?string $original_estimate_id = null,
        public readonly ?string $show_tax = null,
        public readonly ?string $sign_online = null,
        public readonly ?string $sent_at = null,
        public readonly ?string $accepted_at = null,
        public readonly ?string $rejected_at = null,
        public readonly ?string $archived_at = null,
        public readonly ?string $created_at = null,
        public readonly ?string $updated_at = null,
        public readonly ?string $public_view_code = null,
        public readonly ?string $version = null,
        public readonly ?string $pre_text = null,
        public readonly ?string $post_text = null,
        public readonly ?string $total_price_excl_tax = null,
        public readonly ?string $total_price_excl_tax_base = null,
        public readonly ?string $total_price_incl_tax = null,
        public readonly ?string $total_price_incl_tax_base = null,
        public readonly ?string $total_tax = null,
        public readonly ?string $total_tax_base = null,
        public readonly ?string $prices_are_incl_tax = null,
        public readonly ?array $details = null,
        public readonly ?array $custom_fields = null,
        public readonly ?array $notes = null,
        public readonly ?array $events = null,
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
            estimate_id: $data['estimate_id'] ?? null,
            workflow_id: $data['workflow_id'] ?? null,
            document_style_id: $data['document_style_id'] ?? null,
            identity_id: $data['identity_id'] ?? null,
            state: $data['state'] ?? null,
            estimate_date: $data['estimate_date'] ?? null,
            due_date: $data['due_date'] ?? null,
            reference: $data['reference'] ?? null,
            language: $data['language'] ?? null,
            currency: $data['currency'] ?? null,
            exchange_rate: $data['exchange_rate'] ?? null,
            discount: $data['discount'] ?? null,
            original_estimate_id: $data['original_estimate_id'] ?? null,
            show_tax: $data['show_tax'] ?? null,
            sign_online: $data['sign_online'] ?? null,
            sent_at: $data['sent_at'] ?? null,
            accepted_at: $data['accepted_at'] ?? null,
            rejected_at: $data['rejected_at'] ?? null,
            archived_at: $data['archived_at'] ?? null,
            created_at: $data['created_at'] ?? null,
            updated_at: $data['updated_at'] ?? null,
            public_view_code: $data['public_view_code'] ?? null,
            version: $data['version'] ?? null,
            pre_text: $data['pre_text'] ?? null,
            post_text: $data['post_text'] ?? null,
            total_price_excl_tax: $data['total_price_excl_tax'] ?? null,
            total_price_excl_tax_base: $data['total_price_excl_tax_base'] ?? null,
            total_price_incl_tax: $data['total_price_incl_tax'] ?? null,
            total_price_incl_tax_base: $data['total_price_incl_tax_base'] ?? null,
            total_tax: $data['total_tax'] ?? null,
            total_tax_base: $data['total_tax_base'] ?? null,
            prices_are_incl_tax: $data['prices_are_incl_tax'] ?? null,
            details: $data['details'] ?? null,
            custom_fields: $data['custom_fields'] ?? null,
            notes: $data['notes'] ?? null,
            events: $data['events'] ?? null,
        );
    }
}
