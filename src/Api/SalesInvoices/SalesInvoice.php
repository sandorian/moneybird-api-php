<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\SalesInvoices;

use Sandorian\Moneybird\Api\Support\BaseDto;

class SalesInvoice extends BaseDto
{
    public string $id;

    public string $administration_id;

    public string $contact_id;

    public array $contact;

    public ?string $contact_person_id;

    public ?array $contact_person;

    public ?string $invoice_id;

    public ?string $recurring_sales_invoice_id;

    public ?string $subscription_id;

    public string $workflow_id;

    public string $document_style_id;

    public string $identity_id;

    public int $draft_id;

    public string $state;

    public ?string $invoice_date;

    public ?string $due_date;

    public string $payment_conditions;

    public ?string $payment_reference;

    public ?string $short_payment_reference;

    public string $reference;

    public string $language;

    public string $currency;

    public ?string $discount;

    public ?string $original_sales_invoice_id;

    public bool $paused;

    public ?string $paid_at;

    public ?string $sent_at;

    public string $created_at;

    public string $updated_at;

    public ?string $public_view_code;

    public ?string $public_view_code_expires_at;

    public int $version;

    public array $details;

    public array $payments;

    public string $total_paid;

    public string $total_unpaid;

    public string $total_unpaid_base;

    public bool $prices_are_incl_tax;

    public string $total_price_excl_tax;

    public string $total_price_excl_tax_base;

    public string $total_price_incl_tax;

    public string $total_price_incl_tax_base;

    public string|int $total_discount;

    public ?string $marked_dubious_on;

    public ?string $marked_uncollectible_on;

    public int $reminder_count;

    public ?string $next_reminder;

    public ?string $original_estimate_id;

    public string $url;

    public string $payment_url;

    public array $custom_fields;

    public array $notes;

    public array $attachments;

    public array $events;

    public array $tax_totals;
}
