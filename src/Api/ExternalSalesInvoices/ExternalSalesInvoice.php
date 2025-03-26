<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\ExternalSalesInvoices;

use Sandorian\Moneybird\Api\Support\BaseDto;

class ExternalSalesInvoice extends BaseDto
{
    public string $id;

    public string $administration_id;

    public string $contact_id;

    public array $contact;

    public string $date;

    public string $state;

    public ?string $due_date;

    public string $reference;

    public int $entry_number;

    public ?string $origin;

    public ?string $source;

    public ?string $source_url;

    public string $currency;

    public ?string $paid_at;

    public string $created_at;

    public string $updated_at;

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

    public ?string $marked_dubious_on;

    public ?string $marked_uncollectible_on;

    public array $notes;

    public array $attachments;

    public array $events;

    public array $tax_totals;
}
